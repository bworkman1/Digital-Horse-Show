<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Coaches extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Security');
        $this->output->set_template('default');
        $this->load->js('assets/themes/default/js/app/common.js');
    }

    public function index()
    {
        $this->output->set_common_meta('Meet Our Coaches', 'Digital Horse Show Coaches', 'Coaches');
        $this->load->model('Admin/Coach_data');

        $data['page_name'] = 'coaches';
        $data['coaches'] = $this->Coach_data->getAvailableCoaches();

        $this->load->view('users/coaches', $data);
    }


}