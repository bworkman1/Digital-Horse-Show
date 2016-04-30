<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->_init();
    }

    private function _init()
    {
        $this->output->set_template('default');
        $this->load->js('assets/themes/default/js/app/common.js');
    }

    public function index()
    {
        $this->output->set_common_meta('Our Users', 'Digital Horse Show search for a user', 'user, search');
        $this->load->view('profile-home');
    }

    public function profile()
    {
        $unique_name = $this->uri->segment(3);
        $this->load->model('User_videos');
        $this->load->model('Profile');

        $data['user'] = $this->Profile->getUserProfilePage($unique_name);
        if(empty($data['user'])) {
            redirect('users');
            exit;
        }
        $data['videos'] = $this->User_videos->getUsersVideos($this->session->userdata('user_id'));
        $data['page_name'] = '';
        $data['awards'] = '';

        $this->output->set_common_meta('My Profile', 'Digital Horse Show My Profile', '');

        $this->load->view('public-profile', $data);
    }

}