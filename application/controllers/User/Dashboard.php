<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->_init();
    }

    private function _init()
    {
        $this->output->set_common_meta('My Dashboard', 'Digital Horse Show My Dashboard', '');
        $this->load->model('Security');
        $this->load->js('assets/themes/default/js/app/common.js');
        $this->load->js('assets/themes/default/plugins/chart/Chart.js');
        $this->load->js('assets/themes/default/plugins/chart/Chart.Line.js');
        $this->load->js('assets/themes/default/js/app/user-dashboard.js');
        $this->output->set_template('default');

        $this->load->model('widgets');
    }

    public function index()
    {
        $data = array('page_name' => 'dashboard');

        if($this->ion_auth->in_group('admin')) {
            redirect('admin/dashboard');
            exit;
        } elseif($this->ion_auth->in_group('coach')) {
            redirect('coach/dashboard');
            exit;
        } else {
            $this->load->model('User_videos');
            $this->load->model('Widgets');

            $data['points'] = $this->Widgets->getUserPointsSum($this->session->userdata('user_id'));
            $data['remaining_credits'] = $this->Widgets->getUsersRemainingCredits($this->session->userdata('user_id'));
            $data['whats_new'] = $this->Widgets->getWhatsNewData();
            $data['special_offers'] = $this->Widgets->specialOffers();
            $data['recent_scores'] = $this->User_videos->getGradedVideos($this->session->userdata('user_id'), 5);
            $this->load->view('users/users-dashboard', $data);
        }
    }

    /* AJAX CALLS */
    public function getScoresGraphValues()
    {
        if (!$this->input->is_ajax_request()) {
            redirect('user/dashboard');
        }
        $this->output->unset_template();
        $this->load->model('Widgets');
        echo json_encode($this->Widgets->getScoresForChart());
    }
}