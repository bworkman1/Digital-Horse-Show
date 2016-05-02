<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scorecard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->_init();
    }

    private function _init()
    {
        $this->load->js('assets/themes/default/js/app/common.js');
        $this->load->js('assets/themes/default/js/app/score-card.js');
        $this->load->js('assets/themes/default/js/jquery-scrolltofixed-min.js');

        if (!$this->ion_auth->in_group('coach')) {
            redirect('user/dashboard');
            exit;
        }

        $this->load->model('Security');
        $this->output->set_template('default');
    }

    public function index()
    {

    }

    public function view_score_card()
    {
        $id = (int)$this->uri->segment(4);

        $this->output->set_template('full-screen');

        $this->load->model('Coach/Grades');
        $this->load->model('user_videos');

        $data['video'] = $this->user_videos->getVideo($id);
        $data['scores'] = $this->Grades->getScoreCard($id);

        if(empty($data['scores'])) {
            $this->session->set_flashdata('error', 'No score card found for that video, try again');
            redirect('user/my-uploads');
            exit;
        }

        $this->load->view('score-cards/view-score-card', $data);

    }

    public function needs_scored()
    {
        $this->load->model('coach/Grades');
        $data['videos'] = $this->Grades->needsGraded($this->session->userdata('user_id'));

        $this->load->view('coach/needs-scored', $data);
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

        redirect('coach/needs-scored');
        exit;
    }

    public function grade()
    {
        $this->output->set_template('full-screen');
        $id = (int)$this->uri->segment(4);
        if($this->ion_auth->in_group('coach') && !empty($id)) {
            $this->load->model('user_videos');
            $this->load->model('Coach/Grades');
            $this->load->model('Profile');
            $data['video'] = $this->user_videos->getVideo($id);

            $data['user_profile'] = $this->Profile->getUserProfileWidget($id, 'user');

            if($data['video'] && empty($data['video']->score)) {
                $data['scorecard'] = $this->Grades->getUsersScorecard($data['video']->scorecard_id);
                $this->load->view('score-cards/score-card', $data);
            } else {
                $this->session->set_flashdata('error', 'Video has already been graded');
                //TODO: need to redirect to view the score card
                redirect($_SERVER['HTTP_REFERER']);
                exit;
            }
        } else {
            $this->session->set_flashdata('error', 'Only a coach is allowed to view that page');
            redirect('user/dashboard');
            exit;
        }
    }

    public function add_grade()
    {
        if($this->input->is_ajax_request()) {
            $this->output->unset_template();

            $this->load->model('coach/grades');

            $id = (int)$this->uri->segment(4);
            if($this->ion_auth->in_group('coach') && !empty($id)) {
                $field = '';
                $error = false;
                foreach($_POST as $key => $val) {
                    $field = $key; //Set this to let the user know which field is bad
                    if($key != 'errors' && $key != 'total' && $key != 'divider' && $key != 'remarks') {
                        foreach($val as $v) {
                            if(!is_numeric($v)) {
                                $error = true;
                                break;
                            }
                        }
                    }

                    if($key == 'errors' && $key == 'total') {
                        if(!is_numeric($val)) {
                            $error = true;
                            break;
                        }
                    }



                    if($key == 'remarks') {
                        foreach($val as $v) {
                            if(strlen($v)>254) {
                                $error = true;
                                break;
                            }
                        }
                    }

                    if($key == 'divider') {
                        foreach($val as $v) {
                            $t = array('y', 'n');

                            if(!in_array(strtolower($v), $t)) {
                                $error = true;
                                break;
                            }
                        }
                    }

                    if($error) { //Stop checking the form inputs
                        break;
                    }
                }

                if($error) {
                    $feedback = array('error'=>'Invalid input in '.$field.' field ');
                } else {
                    $feedback = $this->grades->submitGrade($_POST, $id);
                }
            } else {
                $feedback = array('error' => 'You are not authorized to grade this users ride, if this is an error please contact support');
            }

            echo json_encode($feedback);
        }
    }


    public function testing()
    {
        $this->output->unset_template();
        $this->load->model('coach/grades');
        echo $this->grades->setVideoStarRank('300', '300');
    }
}