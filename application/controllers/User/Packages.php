<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Packages extends CI_Controller
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
        $this->output->set_common_meta('Our Packages', 'Digital Horse Show Packages', 'pricing, plans, packages');
        $data['page_name'] = 'packages';
        $this->load->view('users/packages', $data);
    }

    public function purchase()
    {
        $package = $this->uri->segment(4);
        if(empty($package)) {
            redirct('user/packages');
            exit;
        }

        echo $package;

    }

}
