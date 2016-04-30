<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Security');
        $this->output->set_template('default');
        $this->load->js('assets/themes/default/js/app/common.js');
    }

    public function index()
    {

    }

    public function results()
    {

    }

}