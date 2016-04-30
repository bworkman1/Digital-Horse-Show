<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->_init();
    }

    private function _init()
    {
        $this->load->js('assets/themes/default/js/app/common.js');

        $this->load->model('Security');
        $this->output->set_template('default');

        if (!$this->ion_auth->in_group('admin')) {
            redirect('user/dashboard');
            exit;
        }

    }

    public function index()
    {
        $this->output->set_template('crud');
        $this->load->library('grocery_CRUD');
        $crud = new grocery_CRUD();
        $crud->set_theme('bootstrap');
        $crud->set_table('payments')->set_subject('Sales');
        $this->load->model('Format_data');
        $crud->callback_column('paid_on', array($this->Format_data,'formatDate'))->columns('trans_id', 'approval_code', 'paid_on', 'user_id', 'amount', 'credits');;
        $crud->display_as('trans_id','Transaction Id');
        $crud->display_as('user_id','Email');
        $crud->set_relation('user_id','users','email');
        $output = $crud->render();

        foreach($output->js_files as $val) {
            $this->load->js($val);
        }
        foreach($output->css_files as $val) {
            $this->load->css($val);
        }
        $data['data'] = $output->output;
        $this->load->view('admin/users', $data);
    }



}