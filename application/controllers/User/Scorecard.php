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
        $this->load->js('assets/themes/default/js/jquery-scrolltofixed-min.js');

        $this->load->model('Security');
        $this->output->set_template('default');
    }

    public function index()
    {
        $this->load->model('Coach/Grades');
        $data['scorecards'] = $this->Grades->getAllScorecards();
        $this->load->view('common/scorecards-list', $data);
    }

    public function view()
    {
        $this->output->set_template('full-screen');
        $video_id = $this->uri->segment(4);
        if($video_id) {
            $this->load->model('Coach/Grades');
            $this->load->model('Profile');
            $data = $this->Grades->getGradedCard($video_id);
            if($data['video']) {
                $data['user_profile'] = $this->Profile->getUserProfileWidget($video_id, 'coach');
                $this->output->set_common_meta('Viewing Score | '.$data['video']->client_name, 'Digital Horse Show My Dashboard', '');
                $this->load->view('common/scored-video-7', $data);
            } else {
                $this->session->set_flashdata('error', 'Invalid Selection');
                redirect('user/dashboard');
                exit;
            }
        } else {
            $this->session->set_flashdata('error', 'Invalid Selection');
            redirect('user/dashboard');
            exit;
        }
    }

    public function preview()
    {
        $this->output->set_template('full-screen');
        $scorecard_id = $this->uri->segment(4);
        if($scorecard_id) {
            $this->load->model('Coach/Grades');
            $data = $this->Grades->getUsersScorecard($scorecard_id);

            if($data) {
                $this->output->set_common_meta('Viewing Score | '.$data['scorecard']->option_name, 'Digital Horse Show My Dashboard', '');
                $this->load->view('common/scored-video-7-preview', $data);

            } else {
              //  $this->session->set_flashdata('error', 'Invalid Selection');
               // redirect('user/dashboard');
                //exit;
            }
        } else {
            $this->session->set_flashdata('error', 'Invalid Selection');
            redirect('user/dashboard');
            exit;
        }
    }

}