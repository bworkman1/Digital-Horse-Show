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
        $this->load->js('assets/themes/default/js/app/common.js');
        $this->load->js('assets/themes/default/js/app/score-card.js');

        $this->load->model('Security');
        $this->output->set_template('default');

        if (!$this->ion_auth->in_group('admin')) {
            redirect('user/dashboard');
            exit;
        }

    }

}