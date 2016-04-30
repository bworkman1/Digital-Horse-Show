<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_uploads extends CI_Controller
{
    var $sortOptions = array(
        'id' => 'Newest',
        'star_rating' => 'Rating',
        'size' => 'Size',
        'client_name' => 'Name',
        'oldest' => 'Oldest',
    );

    function __construct()
    {
        parent::__construct();
        $this->_init();
    }

    private function _init()
    {
        $this->load->model('User_videos');
        $this->load->model('Security');
        $this->output->set_template('default');
        $this->load->js('assets/themes/default/js/app/common.js');
    }

    public function index()
    {
        redirect('user/my-uploads/uploads');
        exit;
    }

    public function uploads()
    {
        $this->output->set_common_meta('My Uploads', 'Digital Horse Show My Uploads', '');
        $this->load->model('Common');

        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data['options'] = $this->sortOptions;
        $data['videos'] = $this->User_videos->getUsersVideos($this->session->userdata('user_id'), $page);
        $data['links'] = $this->Common->paginateResults(base_url('/user/my-uploads/uploads/'), $this->User_videos->countUserUploads($this->session->userdata('user_id')), $this->User_videos->mVideoLimit);
        $data['page_name'] = 'my-uploads';

        $this->load->view('users/my-videos', $data);
    }

    public function sort()
    {
        $this->form_validation->set_rules('sort_by', 'Sort By', 'required|min_length[2]|max_length[15]');
        if ($this->form_validation->run() == true) {

            if(!array_key_exists ($_POST['sort_by'], $this->sortOptions)) {
                $this->session->set_flashdata('error', 'Invalid Sort By Selection!');
            } else {
                $this->session->set_flashdata('success', 'Videos are now sorted!');
                $this->session->set_userdata('video_sort', $_POST['sort_by']);
            }
        } else {
            $this->session->set_flashdata('error', validation_errors('<span>','</span>'));
        }

        redirect('user/my-uploads');
        exit;
    }

    public function view()
    {
        $this->load->js('http://maps.googleapis.com/maps/api/js');
        $this->load->js('assets/themes/default/js/app/view-video.js');
        $this->load->css('assets/themes/default/plugins/alertify/css/alertify.min.css');
        $this->load->css('assets/themes/default/plugins/alertify/css/themes/semantic.css');
        $this->load->js('assets/themes/default/plugins/alertify/alertify.min.js');

        $id = (int)$this->uri->segment(4);
        if($id>0) {
            $data['video'] = $this->User_videos->getVideo($id);
            if(!empty($data['video'])) {
                $data['related'] = $this->User_videos->getRelatedVideos($id, $data['video']->user_id);
                $data['user'] = $this->ion_auth->user()->row($data['video']->user_id);
                $data['page_name'] = 'view-videos';
                $data['score'] = $this->User_videos->getRelatedScores($id);
                $data['coach'] = $this->ion_auth->user()->row($data['video']->coach_id);
                $data['next'] = $this->User_videos->getNextVideo($id);
                $data['prev'] = $this->User_videos->getPreviousVideo($id);

                $this->output->set_common_meta($data['video']->client_name .'| Digital Horse Show', 'Digital Horse Show ' . $data['video']->client_name, '');
                $this->load->view('users/view-video', $data);
            } else {
                $this->output->set_template('default');
                $this->load->js('assets/themes/default/js/app/common.js');
                $this->load->js('assets/themes/default/js/app/error-404.js');
                $this->load->js('assets/themes/default/plugins/alertify/alertify.min.js');
                $this->load->css('assets/themes/default/css/error_404.css');
                $this->load->css('assets/themes/default/plugins/alertify/css/alertify.min.css');

                $this->load->view('404-page');
            }
        } else {
            $this->session->set_flashdata('error', 'Invalid Selection');
            redirect('user/my-uploads');
            exit;
        }
    }

    public function submit_comment()
    {
        if($this->input->is_ajax_request()) {
            $this->output->unset_template();
            $this->form_validation->set_rules('comment', 'Comment', 'required|min_length[2]|max_length[2000]');
            $this->form_validation->set_rules('id', 'Id', 'required|min_length[1]|max_length[14]|integer');
            if ($this->form_validation->run() == true) {
                $this->load->model('Comments');
                $feedback = $this->Comments->addComment($_POST['comment'], $_POST['id']);
            } else {
                $feedback = array('error' => validation_errors('<span>', '</span>'));
            }

            echo json_encode($feedback);
            exit;
        }
    }

    public function delete_video()
    {
        $id = (int)$this->uri->segment(4);
        if($this->ion_auth->in_group('admin') && $id > 0) {
            $this->load->model('uploads');
            if($this->uploads->delete_upload($id)) {
                $this->session->set_flashdata('success', 'Video successfully deleted');
            } else {
                $this->session->set_flashdata('error', 'Video failed to delete, try again');
            }
        } else {
            $this->session->set_flashdata('error', 'You don\'t have the permissions to delete this file');
        }
        redirect('user/my-uploads');
        exit;
    }

    public function delete_comment()
    {
        $this->form_validation->set_rules('id', 'Comment Id', 'required|min_length[1]|max_length[14]|integer');
        if ($this->form_validation->run() == true) {
            if($this->input->is_ajax_request() && $this->ion_auth->in_group('admin') && $_POST['id'] > 0) {
                $this->output->unset_template();
                $this->load->model('comments');
                $result = $this->comments->delete_comment($_POST['id']);
                $feedback = array('error' => 'Comment failed to delete, try again');
                if($result) {
                    $feedback = array('success'=>'Comment deleted');
                }

            } else {
                $feedback = array('error' => 'You are not allowed to delete comments');
            }
        } else {
            $feedback = array('error' => 'Comment failed to delete, try refreshing the page');
        }

        echo json_encode($feedback);
        exit;
    }

}