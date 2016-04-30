<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Videos extends CI_Controller
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
    }

    public function index()
    {
        $data['options'] = $this->sortOptions;
        $data['videos'] = $this->User_videos->getUsersVideos($this->session->userdata('user_id'));

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

        redirect('user/videos');
        exit;
    }

    public function view()
    {
        $this->load->model('Comments');

        $this->load->js('assets/themes/default/js/app/view-video.js');
        $this->load->css('assets/themes/default/plugins/alertify/css/alertify.min.css');
        $this->load->css('assets/themes/default/plugins/alertify/css/themes/semantic.css');
        $this->load->js('assets/themes/default/plugins/alertify/alertify.min.js');

        $id = (int)$this->uri->segment(4);
        if($id>0) {
            $data['video'] = $this->User_videos->getVideo($id);
            $data['comments'] = $this->Comments->getVideoComments($id);
            $data['related'] = $this->User_videos->getRelatedVideos($id, $data['video']->user_id);

            $this->load->view('users/view-video', $data);
        } else {
            $this->session->set_flashdata('error', 'Invalid Selection');
            redirect('user/videos');
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

}