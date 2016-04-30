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
        $this->load->js('assets/themes/default/js/jquery-1.9.1.min.js');
        $this->load->model('Security');
        if (!$this->ion_auth->in_group('admin')) {
            redirect('user/dashboard');
            exit;
        }

    }

    public function index()
    {
        redirect('admin/users/all-users');
        exit;
    }

    public function all_users()
    {
        $this->output->set_template('crud');
        $this->load->library('grocery_CRUD');
        $crud = new grocery_CRUD();
        $crud->set_theme('bootstrap');
        $crud->set_table('users')->set_subject('All Users')->columns('username', 'email', 'first_name', 'last_name', 'last_login');
        $this->load->model('Format_data');
        $crud->edit_fields('username', 'password', 'email', 'active', 'first_name', 'last_name', 'phone', 'bio', 'profile_name', 'facebook', 'google', 'twitter', 'instagram');
        $crud->callback_column('created_on', array($this->Format_data,'last_login'));
        $crud->callback_before_update(array($this,'encrypt_password_callback'));
        $output = $crud->render();

        foreach($output->js_files as $val) {
            $this->load->js($val);
        }
        foreach($output->css_files as $val) {
            $this->load->css($val);
        }
        $this->load->js('assets/themes/default/js/app/common.js');

        $data['data'] = $output->output;
        $this->load->view('admin/users', $data);
    }

    function encrypt_password_callback($post_array, $primary_key) {
        $this->ion_auth_model->hash_password('password',FALSE,FALSE);
        
        if(!empty($post_array['password']))
        {
            $post_array['password'] = $this->ion_auth_model->hash_password($post_array['password'],FALSE,FALSE);
        } else {
            unset($post_array['password']);
        }

        return $post_array;
    }


}