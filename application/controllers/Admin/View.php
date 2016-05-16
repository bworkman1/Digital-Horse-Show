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
        $this->load->js('assets/themes/default/js/app/common.js');
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
        $this->output->set_common_meta('Admin - Make a Payment', 'Digital Horse Show My Dashboard', '');

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

    public function all_payments()
    {
        $this->output->set_common_meta('Admin - All Payment', 'Digital Horse Show My Dashboard', '');
        $this->load->js('assets/themes/default/js/app/view-payments.js');
        $id = (int)$this->uri->segment(4);

        $this->load->model('Payments');

        if($id) {
            $data = $this->Payments->init_payment_page($id);
        } else {
            $data = $this->Payments->init_payment_page();
        }
        $this->load->view('common/view-payments', $data);
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

    public function waiting_to_be_scored()
    {
        $id = (int)$this->uri->segment(4);
        $this->load->js('assets/themes/default/js/app/common.js');
        $this->output->set_common_meta('Waiting To Be Scored', 'Digital Horse Show Waiting To Be Scored', '');

        $this->load->model('Admin/Coach_data');
        $data['waiting'] = $this->Coach_data->waitingBeScored($id);

        $this->load->view('admin/waiting-to-be-scored', $data);
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