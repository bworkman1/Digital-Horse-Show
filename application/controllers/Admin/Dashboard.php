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
        $this->load->js('assets/themes/default/js/admin/admin-dashboard.js');
        $this->output->set_template('default');

        $this->load->model('admin/Widgets');

        if (!$this->ion_auth->in_group('admin')) {
            redirect('user/dashboard');
            exit;
        }
    }

    public function index()
    {
        $data['page_name'] = 'dashboard';

        $this->load->model('Admin/Surveys');

        $data['new_users'] = $this->Widgets->newUsersThisMonth();
        $data['coaches'] = $this->Widgets->newCoachesThisMonth();
        $data['sales30'] = $this->Widgets->getSales30Days();
        $data['recent_uploads'] = $this->Widgets->getRecentUploads(5);
        $data['surveys'] = $this->Surveys->getRecentSurveys(5);
        $this->load->view('admin/admin-dashboard', $data);
    }

    public function addUser()
    {
        $username = 'benedmunds'.rand(100, 999999999);
        $password = 'password';
        $email = 'ben.edmunds'.rand(100, 999999999).'@gmail.com';
        $additional_data = array(
            'first_name' => 'Ben',
            'last_name' => 'Edmunds',
        );
        $group = array('2'); // Sets users group.

        $this->ion_auth->register($username, $password, $email, $additional_data, $group);
    }

    /* AJAX CALLS */
    public function getSalesGraphValues()
    {
        $this->output->unset_template();
        echo json_encode($this->Widgets->getSalesForGraph());
    }

}