<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Error_404 extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->output->set_template('default');
        $this->load->js('assets/themes/default/js/app/common.js');
        $this->load->js('assets/themes/default/js/app/error-404.js');
        $this->load->js('assets/themes/default/plugins/alertify/alertify.min.js');
        $this->load->css('assets/themes/default/css/error_404.css');
        $this->load->css('assets/themes/default/plugins/alertify/css/alertify.min.css');
    }

    public function index()
    {
        $this->load->view('404-page');
    }

    public function contact_support()
    {
        $this->output->unset_template();

        $this->form_validation->set_rules('email', 'Email', 'required|min_length[6]|max_length[50]|valid_email|prep_for_form');
        $this->form_validation->set_rules('info', 'Additional Info', 'required|min_length[6]|max_length[500]|prep_for_form');
        $this->form_validation->set_rules('url', 'URL', 'required|min_length[6]|max_length[100]|xss_clean');

        if ($this->form_validation->run() == true) {
            $this->load->model('admin/support');
            if($this->support->error_support($_POST)) {
                echo json_encode(array('success' => 'Thanks for your help, we will look into this and contact you by email if needed'));
            } else {
                echo json_encode(array('error' => $this->support->mError));
            }
        } else {
            echo json_encode(array('error' => validation_errors('<div>','</div>')));
        }

    }

}