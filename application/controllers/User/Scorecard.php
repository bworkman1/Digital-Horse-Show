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

    }

    public function view()
    {
        $this->output->set_template('full-screen');
        $video_id = $this->uri->segment(4);
        if($video_id) {
            $this->load->model('Coach/Grades');
            $data = $this->Grades->getGradedCard($video_id);
            $this->output->set_common_meta('Viewing Score | '.$data['video']->client_name, 'Digital Horse Show My Dashboard', '');

            $this->load->view('common/scored-video-7', $data);
        } else {
            //send them somewhere
        }
    }

}