<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rules_and_patterns extends CI_Controller
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
        $this->load->js('assets/themes/default/js/app/common.js');
    }

    public function index()
    {
        $this->output->set_common_meta('Rules and Patterns', 'Digital Horse Show Rules and Patterns', 'Rules, Patterns');
        $data['page_name'] = 'rules';
        $this->load->view('users/rules-and-patterns', $data);
    }

}