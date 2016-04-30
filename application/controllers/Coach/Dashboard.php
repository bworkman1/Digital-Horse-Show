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
        $data['page_name'] = 'dashboard';
        $data['scored'] = $this->widgets->coachNeedsScored();
        $data['scoredThisMonth'] = $this->widgets->coachScoredThisMonth();

        $this->load->view('coach/coach-dashboard', $data);
    }

}