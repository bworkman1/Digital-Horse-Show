<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * This file serves as the users public page and doesn't matter if the user is coach or regular user
 */

class Profile extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->_init();
    }

    private function _init()
    {
        $this->load->model('Security');
        $this->output->set_template('default');
    }

    public function index()
    {

    }

}