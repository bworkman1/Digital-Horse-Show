<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Privacy_policy extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->output->set_template('default');
    }

    public function index()
    {
        $this->load->view('common/privacy-policy');
    }

}