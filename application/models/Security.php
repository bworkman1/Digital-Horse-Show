<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Security extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $url = current_url();
        $this->load->helper('cookie');
        $this->input->set_cookie(array(
            'name'      => 'url',
            'value'     => current_url(),
            'expire'    => '86500',
            'domain'    => 'localhost',
            'path'      => '/',
        ));
        $this->session->set_userdata('url_redirect', $url);
        $this->_init();
    }

    private function _init()
    {
        //$this->output->enable_profiler(true);
        if (!$this->ion_auth->logged_in())
        {
            redirect('user/logout/invalidAccess');
        }
    }


}