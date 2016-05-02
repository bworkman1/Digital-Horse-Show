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
        $this->load->js('assets/themes/default/js/app/coach-dashboard.js');
        $this->output->set_template('default');

        if (!$this->ion_auth->in_group('coach')) {
            redirect('user/dashboard');
            exit;
        }

        $this->load->model('widgets');
    }

    public function index()
    {
        $data['page_name'] = 'dashboard';
        $data['scored'] = $this->widgets->coachNeedsScored(5);
        $data['scoredThisMonth'] = $this->widgets->coachScoredThisMonth();

        $this->load->view('coach/coach-dashboard', $data);
    }

    /* AJAX CALLS */
    public function getCoachVideos()
    {
        if (!$this->input->is_ajax_request()) {
            redirect('user/dashboard');
        }
        $this->output->unset_template();
        $this->load->model('Widgets');
        echo json_encode($this->Widgets->getCoachVideosChart());
    }

}