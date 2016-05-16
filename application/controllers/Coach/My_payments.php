<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_payments extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->_init();
    }

    private function _init()
    {
        $this->load->js('assets/themes/default/js/app/common.js');
        $this->load->js('assets/themes/default/js/jquery-scrolltofixed-min.js');

        if (!$this->ion_auth->in_group('coach') || !$this->ion_auth->in_group('admin')) {
            //redirect('user/dashboard');
            // exit;
        }

        $this->load->model('Security');
        $this->output->set_template('default');
    }


    public function index()
    {
        $this->output->set_common_meta('My Payments', 'Digital Horse Show My Dashboard', '');

        $this->load->model('Admin/Admin_settings');
        $this->load->model('Admin/Payments');

        $this->load->css('assets/themes/default/plugins/alertify/css/alertify.min.css');

        $this->load->js('assets/themes/default/plugins/alertify/alertify.min.js');
        $this->load->js('assets/themes/default/js/app/google-auto-complete.js');
        $this->load->js('assets/themes/default/js/admin/coach-payments.js');



        $data['payments'] = $this->Payments->getAllCoachPayments($this->session->userdata('user_id'));
        $this->load->view('admin/coach-payments', $data);
    }

    public function waiting_to_be_paid()
    {
        $this->output->set_common_meta('Waiting For Payment Paid', 'Digital Horse Show My Dashboard', '');

        $this->load->model('Admin/Admin_settings');
        $this->load->model('Admin/Payments');

        $this->load->css('assets/themes/default/plugins/alertify/css/alertify.min.css');

        $this->load->js('assets/themes/default/plugins/alertify/alertify.min.js');
        $this->load->js('assets/themes/default/js/app/google-auto-complete.js');
        $this->load->js('assets/themes/default/js/admin/coach-payments.js');


        $data['needs_paid'] = $this->Payments->needsPaid($this->session->userdata('user_id'));
        $data['coach'] =  $this->ion_auth->user($this->session->userdata('user_id'))->row();
        $data['paid_per'] = $this->Admin_settings->getSetting('paid_per_video');

        $this->load->view('coach/needs-paid', $data);
    }

}
