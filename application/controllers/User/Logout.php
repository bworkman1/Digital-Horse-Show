<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller
{

    public function index()
    {
        $this->ion_auth->logout();
        $this->session->set_flashdata('success', 'You have been logged out');
        redirect('login');
    }

    public function invalidAccess()
    {
        $url = $this->input->cookie('url');
        $this->ion_auth->logout();
        $this->session->set_flashdata('error', 'You must login first');
        if($url) {
            $this->session->set_userdata('login_url', $url);
        }
        redirect('login');
    }

}

?>