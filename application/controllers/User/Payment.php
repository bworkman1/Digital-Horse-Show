<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller
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
        $this->load->js('assets/themes/default/js/app/payment.js');
        $this->load->js('assets/themes/default/js/formValidation.min.js');
        $this->load->js('assets/themes/default/js/framework/bootstrap.min.js');
        $this->load->js('assets/themes/default/plugins/alertify/alertify.min.js');
        $this->load->css('assets/themes/default/css/formValidation.min.css');
        $this->load->css('assets/themes/default/plugins/alertify/css/alertify.min.css');
        $this->load->css('assets/themes/default/plugins/alertify/css/themes/semantic.css');
    }

    public function index()
    {
        $this->load->model('admin/Admin_settings');
        $this->load->model('coach/Coaches');
        $data['coaches'] = $this->Coaches->getAvailableCoaches();
        $data['payment_settings'] = $this->Admin_settings->getSetting('coaching_credits');
        $this->output->set_common_meta('Purchase', 'Digital Horse Show Purchase', '');
        $data['page_name'] = 'payment';
        $this->load->view('users/payment-page', $data);
    }

    public function submit()
    {
        $this->output->enable_profiler(false);
        $this->output->unset_template();
        $this->form_validation->set_rules('coaching_credits', 'Coaching Credits', 'required|min_length[1]|max_length[2]|integer');
        $this->form_validation->set_rules('card_name', 'Card Name', 'required|min_length[4]|max_length[60]');
        $this->form_validation->set_rules('card_number', 'Card Number', 'required|min_length[16]|max_length[19]');
        $this->form_validation->set_rules('expiry_month', 'Expiration Date', 'required|min_length[2]|max_length[2]');
        $this->form_validation->set_rules('expiry_year', 'Expiry Year', 'required|min_length[4]|max_length[4]');
        $this->form_validation->set_rules('cvv', 'CCV', 'required|min_length[3]|max_length[5]|integer');
        $this->form_validation->set_rules('total', 'Total', 'required|min_length[2]|max_length[8]');

        if ($this->form_validation->run() == true) {
            $this->load->model('Process_payment');
            if($this->Process_payment->checkTotalAmount($_POST['total'], $_POST['coaching_credits'])) {
                if($this->Process_payment->process($_POST)) {
                    $this->session->set_flashdata('success', $this->Process_payment->mSuccess);
                    $feedback = array('success' => $this->Process_payment->mSuccess);
                } else {
                    $feedback = array('error' => $this->Process_payment->mError);
                }
            } else {
                $feedback = array('error' => 'It looks like the prices we have are not matching up with what you see. Contact support if this continues.');
            }
        } else {
            $feedback = array('error'=>validation_errors('<span>','</span>'));
        }

        if($this->input->is_ajax_request()) {
            echo json_encode($feedback);
        } else {
           $this->session->set_flashdata($feedback);
            redirect('user/payment');
            exit;
        }

    }

    public function all()
    {
        $this->load->model('Process_payment');
        $data['payments'] = $this->Process_payment->getUsersPayments($this->session->userdata('user_id'));
        $data['page_name'] = 'payments';
        $this->load->view('users/my-payments', $data);
    }


}