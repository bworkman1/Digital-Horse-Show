<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->output->set_template('default');
        $this->load->js('assets/themes/default/js/app/common.js');
        $this->load->js('assets/themes/default/js/app/public-profile.js');
    }

    public function index()
    {
        $this->load->view('users/public-profile-page');
    }

    public function search()
    {
        $this->output->unset_template();
        $this->form_validation->set_rules('search', 'Search', 'required|min_length[3]|max_length[20]|xss_clean');
        if ($this->form_validation->run() == true) {
            $this->load->model('Admin_users');

            $users = $this->Admin_users->searchUser($_POST['search'], '15', array('user_image', 'first_name', 'last_name', 'profile_name'));
            if($users) {
                echo json_encode($users);
            } else {
                echo json_encode('error', 'No user found');
            }
        } else {
            echo json_encode(array('error' => validation_errors('<span>', '</span>')));
        }
    }

    public function user()
    {
        $user = $this->uri->segment(3);
        if($user) {
            $this->load->model('Admin_users');
            $data['user'] = $this->Admin_users->getUserByProfileName($user);
            $this->load->view('public-profile', $data);
        }
    }

}