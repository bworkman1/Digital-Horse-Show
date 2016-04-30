<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->_init();
    }

    private function _init()
    {
        $this->checkIfLoggedIn();

        $this->output->set_template('no-nav');
        $this->load->css('assets/themes/default/css/formValidation.min.css');
        $this->load->js('assets/themes/default/js/formValidation.min.js');
        $this->load->js('assets/themes/default/js/framework/bootstrap.min.js');
        $this->load->js('assets/themes/default/js/app/login.js');
    }

    public function index()
    {
        $this->output->set_common_meta('User Login', 'Digital Horse Show Create Account', 'create, account');

        //validate form input
        $this->form_validation->set_rules('identity', 'Identity', 'required|min_length[6]|max_length[50]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[50]');

        if ($this->form_validation->run() == true)
        {
            // check to see if the user is logging in
            // check for "remember me"
            $remember = (bool) $this->input->post('remember');

            if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember)) {
                //if the login is successful
                $this->load->library('Geolocation');
                $this->load->config('geolocation', true);

                $config = $this->config->config['geolocation'];

                $this->geolocation->initialize($config);
                $this->geolocation->set_ip_address($_SERVER['REMOTE_ADDR']); // IP to locate

                // For more precision
                $userLocationDetails = $this->geolocation->get_city();
                if(!$this->geolocation->get_error()) {
                    $this->session->set_userdata('lat', $userLocationDetails['latitude']);
                    $this->session->set_userdata('lng', $userLocationDetails['longitude']);
                }
                $this->session->set_flashdata('success', $this->ion_auth->messages());
                $redirect_url = $this->input->cookie('url');
                if($redirect_url) {
                    $this->input->set_cookie(array(
                        'name'      => 'url',
                        'value'     => '',
                        'expire'    => '',
                    ));
                    header('Location: '.$redirect_url);
                    exit;
                }
                redirect('user/dashboard/');
            } else {
                // if the login was un-successful
                // redirect them back to the login page
                $this->session->set_flashdata('error', $this->ion_auth->errors());
                redirect('login', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
            }
        } else {
            $error = validation_errors('<span>','</span>');
            if(!empty($error)) {
                $this->session->set_flashdata('error', $error);
                redirect('login', 'refresh');
            }
        }

        $this->data['identity'] = array('name' => 'identity',
            'id'    => 'identity',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('identity'),
            'class' => 'form-control',
        );

        $this->data['password'] = array('name' => 'password',
            'id'   => 'password',
            'type' => 'password',
            'class' => 'form-control',
        );

        $this->load->view('auth/login', $this->data);
    }

    private function checkIfLoggedIn()
    {
        if ($this->ion_auth->logged_in())
        {
            redirect('user/dashboard');
        }
    }

}