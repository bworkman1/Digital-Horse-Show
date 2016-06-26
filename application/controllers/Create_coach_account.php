<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Create_coach_account extends CI_Controller
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
        $this->output->set_template('default');

        $this->load->css('assets/themes/default/css/formValidation.min.css');
        $this->load->css('assets/themes/default/plugins/alertify/css/alertify.min.css');
        $this->load->css('assets/themes/default/plugins/alertify/css/themes/semantic.rtl.min.css');
        $this->load->js('assets/themes/default/js/formValidation.min.js');
        $this->load->js('assets/themes/default/js/framework/bootstrap.min.js');
        $this->load->js('assets/themes/default/plugins/alertify/alertify.min.js');
        $this->load->js('assets/themes/default/js/app/coach-create-account.js');
    }

    public function index()
    {
        $this->load->view('coach/create-account');
    }
    
    private function checkIfLoggedIn()
    {
        if ($this->ion_auth->logged_in())
        {
            redirect('user/dashboard');
        }
    }

    public function create_account()
    {
        $this->output->unset_template();
        $this->session->set_flashdata('full_name', $_POST['first_name'].' '.$_POST['last_name']);
        $config = array(
            array(
                'field'   => 'email',
                'label'   => 'Email',
                'rules'   => 'required|valid_email|is_unique[users.email]|trim|xss_clean'
            ),
            array(
                'field'   => 'username',
                'label'   => 'Username',
                'rules'   => 'required|min_length[6]|is_unique[users.username]|max_length[15]|trim|xss_clean'
            ),
            array(
                'field'   => 'password',
                'label'   => 'Password',
                'rules'   => 'required|min_length[6]|max_length[20]|trim|xss_clean|matches[password_confirm]'
            ),
            array(
                'field'   => 'password_confirm',
                'label'   => 'Password Confirmation',
                'rules'   => 'required|min_length[6]|max_length[20]|trim|xss_clean'
            ),
            array(
                'field'   => 'first_name',
                'label'   => 'First Name',
                'rules'   => 'required|min_length[2]|max_length[30]|trim|xss_clean'
            ),
            array(
                'field'   => 'last_name',
                'label'   => 'Last Name',
                'rules'   => 'required|min_length[2]|max_length[30]|trim|xss_clean'
            ),
            array(
                'field'   => 'address',
                'label'   => 'Address',
                'rules'   => 'required|min_length[2]|max_length[50]|trim|xss_clean'
            ),
            array(
                'field'   => 'city',
                'label'   => 'City',
                'rules'   => 'required|min_length[2]|max_length[50]|trim|xss_clean'
            ),
            array(
                'field'   => 'state',
                'label'   => 'State',
                'rules'   => 'required|min_length[2]|max_length[2]|trim|xss_clean'
            ),
            array(
                'field'   => 'zip',
                'label'   => 'Zip',
                'rules'   => 'required|min_length[5]|max_length[10]|trim|xss_clean'
            ),
            array(
                'field'   => 'agree_confidentiality',
                'label'   => 'Agree to Confidentiality Agreement',
                'rules'   => 'required|min_length[3]|max_length[3]|trim|xss_clean'
            ),
            array(
                'field'   => 'agree_policies',
                'label'   => 'Agree to Policies for trot to the top',
                'rules'   => 'required|min_length[3]|max_length[3]|trim|xss_clean'
            ),
            array(
                'field'   => 'agree_ethics',
                'label'   => 'Agree to Professional Ethics',
                'rules'   => 'required|min_length[3]|max_length[3]|trim|xss_clean'
            ),
            array(
                'field'   => 'sign_confidentiality',
                'label'   => 'Sign the Confidentiality Agreement',
                'rules'   => 'required|min_length[2]|max_length[30]|trim|xss_clean|callback_signature_check'
            ),
            array(
                'field'   => 'sign_policies',
                'label'   => 'Sign the Policies for trot to the top',
                'rules'   => 'required|min_length[2]|max_length[30]|trim|xss_clean|callback_signature_check'
            ),
            array(
                'field'   => 'sign_ethics',
                'label'   => 'Sign the Professional Ethics Form',
                'rules'   => 'required|min_length[2]|max_length[30]|trim|xss_clean|callback_signature_check'
            ),
            array(
                'field'   => 'terms_of_service',
                'label'   => 'Agree to the Terms of Service',
                'rules'   => 'required|min_length[3]|max_length[3]|trim|xss_clean'
            ),
        );
        $this->form_validation->set_message('is_unique', '%s is already in use');
        $this->form_validation->set_message('matches', 'Passwords don\'t match');
        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == FALSE) {
            $errors = $this->form_validation->error_array();
            $feedback['success'] = false;
            $feedback['errors'] = $errors;
        } else {
            extract($_POST);
            $userObject = [
                //First Step
                'first_name'        => $first_name,
                'last_name'         => $last_name,

                //Second Step
                'mailing_address'   => $address,
                'mailing_city'      => $city,
                'mailing_state'     => $state,
                'mailing_zip'       => $zip,

                'confidentiality'   => 'assets/uploads/ConfidentialityAgreement.pdf',
                'trot_policies'     => 'assets/uploads/PoliciesforTrottotheTop.pdf',
                'ethics'            => 'assets/uploads/ProfessionalEthics.pdf',

                'active' => 0,
            ];

            $registered = $this->ion_auth->register($username, $password, $email, $userObject, [3]);
            if($registered === false) {
                $feedback['success'] = false;
                $errors[] = ['' => 'We are sorry, something went wrong when creating your account!'];
                $feedback['errors'] = $errors;
            } else {
                $feedback['success'] = true;
                $feedback['msg'] = 'Your account has been created!';
            }
        }

        echo json_encode($feedback);
    }

    public function signature_check($signature)
    {
        $namesArray = explode(' ', $this->session->flashdata('full_name'));
        $sigArray = explode(' ', $signature);

        if(strtolower($sigArray[0].' '.end($sigArray)) != strtolower($namesArray[0].' '.end($namesArray))) {
            $this->form_validation->set_message('signature_check', 'The %s field does not match your name "'.strtolower($this->session->flashdata('full_name')).'"');
            return false;
        }
    }

    public function account_created() 
    {
        $this->output->set_common_meta('Account Created', 'Digital Horse Show Create Account', 'Create, User, Account, New');
        $this->load->view('coach/account-created');
    }
}