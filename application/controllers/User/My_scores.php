<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_scores extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Security');
        $this->output->set_template('default');
        $this->load->js('assets/themes/default/js/app/common.js');
    }

    public function index()
    {
        $this->output->set_common_meta('My Scores', 'Digital Horse Show My Scores', 'Scores');

        $this->load->model('user_videos');
        $data['page_name'] = 'my-scores';
        $data['videos'] = $this->user_videos->getGradedVideos($this->session->userdata('user_id'));
        $this->load->view('users/my-scores', $data);
    }


}