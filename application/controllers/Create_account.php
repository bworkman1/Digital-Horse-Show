<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Create_account extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->_init();
    }

    private function _init()
    {
        $this->checkIfLoggedIn();
        $this->output->set_common_meta('Create Account', 'Digital Horse Show Create Account', 'Create, User, Account, New');
        $this->output->set_template('no-nav');

        $this->load->css('assets/themes/default/css/formValidation.min.css');
        $this->load->js('assets/themes/default/js/formValidation.min.js');
        $this->load->js('assets/themes/default/js/framework/bootstrap.min.js');
        $this->load->js('assets/themes/default/js/app/create-account.js');
    }

    public function index()
    {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            //redirect('login', 'refresh');
        }

        $tables = $this->config->item('tables','ion_auth');
        $identity_column = $this->config->item('identity','ion_auth');
        $this->data['identity_column'] = $identity_column;

        // validate form input
        $this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'required');
        $this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'required');
        if($identity_column!=='email') {
            $this->form_validation->set_rules('identity',$this->lang->line('create_user_validation_identity_label'),'required|is_unique['.$tables['users'].'.'.$identity_column.']');
            $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|is_unique[users.email]');
        } else {
            $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|is_unique[' . $tables['users'] . '.email]');
        }
        $this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'trim');
        $this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');
        $this->form_validation->set_rules('terms', $this->lang->line('create_user_terms_label'), 'required|integer|max_length[1]');

        if ($this->form_validation->run() == true) {
            $email    = strtolower($this->input->post('email'));
            $identity = ($identity_column==='email') ? $email : $this->input->post('identity');
            $password = $this->input->post('password');

            $additional_data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name'  => $this->input->post('last_name'),
                'phone'      => $this->input->post('phone'),
            );
        }

        $groups = array('2');
        if ($this->form_validation->run() == true && $this->ion_auth->register($identity, $password, $email, $additional_data, $groups)) {
            // check to see if we are creating the user
            // redirect them back to the admin page
            $this->session->set_flashdata('success', $this->ion_auth->messages());
            redirect("create-account", 'refresh');
        } else {
            // display the create user form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

            $this->data['first_name'] = array(
                'name'  => 'first_name',
                'id'    => 'first_name',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('first_name'),
                'class' => 'form-control',
            );
            $this->data['last_name'] = array(
                'name'  => 'last_name',
                'id'    => 'last_name',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('last_name'),
                'class' => 'form-control',
            );
            $this->data['identity'] = array(
                'name'  => 'identity',
                'id'    => 'identity',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('identity'),
                'class' => 'form-control',
            );
            $this->data['email'] = array(
                'name'  => 'email',
                'id'    => 'email',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('email'),
                'class' => 'form-control',
            );
            $this->data['phone'] = array(
                'name'  => 'phone',
                'id'    => 'phone',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('phone'),
                'class' => 'form-control',
            );
            $this->data['password'] = array(
                'name'  => 'password',
                'id'    => 'password',
                'type'  => 'password',
                'value' => $this->form_validation->set_value('password'),
                'class' => 'form-control',
            );
            $this->data['password_confirm'] = array(
                'name'  => 'password_confirm',
                'id'    => 'password_confirm',
                'type'  => 'password',
                'value' => $this->form_validation->set_value('password_confirm'),
                'class' => 'form-control',
            );

            $this->load->view('auth/create_user', $this->data);
        }
    }

    public function activate($id, $code=false)
    {
        $id = $this->uri->segment(3);
        $code = $this->uri->segment(4);

        if ($code !== false && !empty($id)) {
            $activation = $this->ion_auth->activate($id, $code);
        } else if ($this->ion_auth->is_admin()) {
            $activation = $this->ion_auth->activate($id);
        }

        if ($activation) {
            // redirect them to the auth page
            $this->session->set_flashdata('success', $this->ion_auth->messages());
            redirect("login");
        } else {
            // redirect them to the forgot password page
            $this->session->set_flashdata('error', $this->ion_auth->errors());
            redirect("forgot-password");
        }
    }

    private function checkIfLoggedIn()
    {
        if ($this->ion_auth->logged_in())
        {
            redirect('user/dashboard');
        }
    }

    public function email_account_test()
    {
        $this->load->model('Admin/Admin_settings');
        $admin_group_settings = array('social', 'email_footer', 'contact', 'color_scheme');

        $data = array();
        $data['f_name'] = 'Brian';
        $data['id'] = '94';
        $data['activation'] = '29adsfa';
        $data['admin_settings'] = $this->Admin_settings->getSettingsGroup($admin_group_settings);
        $this->load->view('auth/email/activate.tpl.php', $data);
    }

}