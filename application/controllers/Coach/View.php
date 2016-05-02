<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View extends CI_Controller
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

        if (!$this->ion_auth->in_group('coach')) {
            redirect('user/dashboard');
            exit;
        }
        
        $this->load->model('Security');
        $this->output->set_template('default');
    }

    public function scorecard()
    {

        $this->output->set_template('full-screen');
        $video_id = $this->uri->segment(4);
        if($video_id) {
            $this->load->model('Coach/Grades');
            $this->load->model('Profile');

            $data = $this->Grades->getGradedCard($video_id);
            $data['user_profile'] = $this->Profile->getUserProfileWidget($video_id, 'user');
            $this->output->set_common_meta('Viewing Score | '.$data['video']->client_name, 'Digital Horse Show My Dashboard', '');

            $this->load->view('common/scored-video-7', $data);
        } else {
            //send them somewhere
        }
    }

}