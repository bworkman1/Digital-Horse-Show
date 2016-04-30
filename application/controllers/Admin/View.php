<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->_init();
    }

    private function _init()
    {
        $this->output->set_template('default');
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

    public function pay_coach()
    {
        $this->output->set_common_meta('Coach - Make a Payment', 'Digital Horse Show My Dashboard', '');

        $this->load->model('Admin/Admin_settings');
        $this->load->model('Admin/Payments');

        $this->load->css('assets/themes/default/plugins/alertify/css/alertify.min.css');

        $this->load->js('assets/themes/default/plugins/alertify/alertify.min.js');
        $this->load->js('assets/themes/default/js/app/google-auto-complete.js');
        $this->load->js('assets/themes/default/js/admin/coach-payments.js');

        $id = (int)$this->uri->segment(4);
        if(empty($id)) {
            $this->session->set_flashdata('error', 'Invalid Selection');
            redirect('user/coaches');
            exit;
        }

        $data['needs_paid'] = $this->Payments->needsPaid($id);
        $data['coach'] =  $this->ion_auth->user($id)->row();
        $data['paid_per'] = $this->Admin_settings->getSetting('paid_per_video');

        $this->load->view('admin/needs-paid', $data);
    }

    public function coach_payments()
    {
        $this->output->set_common_meta('Coach - Make a Payment', 'Digital Horse Show My Dashboard', '');

        $this->load->model('Admin/Admin_settings');
        $this->load->model('Admin/Payments');

        $this->load->css('assets/themes/default/plugins/alertify/css/alertify.min.css');

        $this->load->js('assets/themes/default/plugins/alertify/alertify.min.js');
        $this->load->js('assets/themes/default/js/app/google-auto-complete.js');
        $this->load->js('assets/themes/default/js/admin/coach-payments.js');

        $id = (int)$this->uri->segment(4);
        if(empty($id)) {
            $this->session->set_flashdata('error', 'Invalid Selection');
            redirect('user/coaches');
            exit;
        }

        $data['payments'] = $this->Payments->getAllCoachPayments($id);
        $this->load->view('admin/coach-payments', $data);
    }

    /* Ajax Call  */
    public function post_payment()
    {
        $this->output->unset_template();
        if($this->input->is_ajax_request()) {
            $this->load->model('Admin/Payments');
            echo json_encode($this->Payments->makePayment($_POST));
        }
    }

}