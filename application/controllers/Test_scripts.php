<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test_scripts extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('404-page');
    }

    public function createNewCoaches()
    {
        $count = $this->url->segment(3);
        for($i=0;$i<$count;$i++) {

            $username = 'benedmunds';
            $password = 'password';
            $email = 'ben.edmunds@gmail.com';
            $additional_data = array(
                'first_name' => 'Ben',
                'last_name' => 'Edmunds',
            );
            $group = array('1'); // Sets user to admin.

            $this->ion_auth->register($username, $password, $email, $additional_data, $group);

        }
    }

    public function tester()
    {
        $this->load->model('test/create_users');
        for($i=0;$i<15;$i++) {
            echo $this->create_users->genUsername(6, 16).'<br>';
        }
    }

}