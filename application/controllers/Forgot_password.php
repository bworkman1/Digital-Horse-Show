<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgot_password extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->_init();
    }

    private function _init()
    {
        $this->checkIfLoggedIn();
        $this->output->set_common_meta('Forgot Password', 'Digital Horse Show Forgot Password', 'Forgot, Passsword, Account');
        $this->output->set_template('no-nav');

        $this->load->css('assets/themes/default/css/formValidation.min.css');
        $this->load->js('assets/themes/default/js/formValidation.min.js');
        $this->load->js('assets/themes/default/js/framework/bootstrap.min.js');
    }

    function index()
    {
        $this->load->js('assets/themes/default/js/app/forgot-password.js');

        // setting validation rules by checking wheather identity is username or email
        if($this->config->item('identity', 'ion_auth') != 'email' ) {
            $this->form_validation->set_rules('identity', $this->lang->line('forgot_password_identity_label'), 'required');
        } else {
            $this->form_validation->set_rules('identity', $this->lang->line('forgot_password_validation_email_label'), 'required|valid_email');
        }

        if ($this->form_validation->run() == false) {
            $this->data['type'] = $this->config->item('identity','ion_auth');
            // setup the input
            $this->data['identity'] = array(
                'name' => 'identity',
                'id' => 'identity',
                'class' => 'form-control',
                'placeholder' => 'john@gmail.com'
            );

            if ( $this->config->item('identity', 'ion_auth') != 'email' ){
                $this->data['identity_label'] = $this->lang->line('forgot_password_identity_label');
            } else {
                $this->data['identity_label'] = $this->lang->line('forgot_password_email_identity_label');
            }

            // set any errors and display the form
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
            $this->load->view('auth/forgot_password', $this->data);
        } else {
            $identity_column = $this->config->item('identity','ion_auth');
            $identity = $this->ion_auth->where($identity_column, $this->input->post('identity'))->users()->row();

            if(empty($identity)) {

                if($this->config->item('identity', 'ion_auth') != 'email') {
                    $this->ion_auth->set_error('forgot_password_user_not_found');
                } else {
                    $this->ion_auth->set_error('forgot_password_email_not_found');
                }

                $this->session->set_flashdata('error', $this->ion_auth->errors());
                redirect("forgot-password", 'refresh');
            }

            // run the forgotten password method to email an activation code to the user
            $forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});

            if ($forgotten) {
                // if there were no errors
                $this->session->set_flashdata('success', $this->ion_auth->messages('success', ''));
                redirect("login", 'refresh'); //we should display a confirmation page here instead of the login page
            } else {
                $this->session->set_flashdata('error', $this->ion_auth->errors());
                redirect("forgot-password", 'refresh');
            }
        }
    }

    public function reset()
    {
        $code = $this->uri->segment(3);
        if (!$code) {
            show_404();
        }
        $this->load->js('assets/themes/default/js/app/reset-password.js');
        $user = $this->ion_auth->forgotten_password_check($code);
        if ($user) {
            // if the code is valid then display the password reset form

            $this->form_validation->set_rules('new', $this->lang->line('reset_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
            $this->form_validation->set_rules('new_confirm', $this->lang->line('reset_password_validation_new_password_confirm_label'), 'required');

            if ($this->form_validation->run() == false) {
                // display the form

                // set the flash data error message if there is one
                $this->data['message'] = validation_errors('<span>','</span>');

                $this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
                $this->data['new_password'] = array(
                    'name' => 'new',
                    'id'   => 'new',
                    'type' => 'password',
                    'class'   => 'form-control',
                    'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
                );
                $this->data['new_password_confirm'] = array(
                    'name'    => 'new_confirm',
                    'id'      => 'new_confirm',
                    'type'    => 'password',
                    'class'   => 'form-control',
                    'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
                );
                $this->data['user_id'] = array(
                    'name'  => 'user_id',
                    'id'    => 'user_id',
                    'type'  => 'hidden',
                    'value' => $user->id,
                );
                $this->data['csrf'] = $this->_get_csrf_nonce();
                $this->data['code'] = $code;


                $this->load->view('auth/reset_password', $this->data);
            } else {
                // do we have a valid request?
                if ($this->_valid_csrf_nonce() === FALSE || $user->id != $this->input->post('user_id')) {
                    // something fishy might be up
                    $this->ion_auth->clear_forgotten_password_code($code);
                    $this->session->set_flashdata('error', $this->lang->line('error_csrf'));
                    redirect('forgot-password/reset' . $code, 'refresh');
                } else {
                    // finally change the password
                    $identity = $user->{$this->config->item('identity', 'ion_auth')};

                    $change = $this->ion_auth->reset_password($identity, $this->input->post('new'));

                    if ($change) {
                        // if the password was successfully changed
                        $this->session->set_flashdata('success', $this->ion_auth->messages());
                        redirect("login", 'refresh');
                    } else {
                        $this->session->set_flashdata('error', $this->ion_auth->errors());
                        redirect('forgot-password/reset' . $code, 'refresh');
                    }
                }
            }
        } else {
            // if the code is invalid then send them back to the forgot password page
            $this->session->set_flashdata('error', $this->ion_auth->errors());
            redirect("forgot-password", 'refresh');
        }
    }

    function _get_csrf_nonce()
    {
        $this->load->helper('string');
        $key   = random_string('alnum', 8);
        $value = random_string('alnum', 20);
        $this->session->set_flashdata('csrfkey', $key);
        $this->session->set_flashdata('csrfvalue', $value);

        return array($key => $value);
    }

    function _valid_csrf_nonce()
    {
        return TRUE;
    }

    private function checkIfLoggedIn()
    {
        if ($this->ion_auth->logged_in())
        {
            redirect('user/dashboard');
        }
    }
}