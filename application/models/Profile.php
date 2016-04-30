<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();

        $id = $this->session->userdata('user_id');
        if (empty($id)) {
            echo 'Get OUT!';
            exit;
        }

    }

    public function getUserProfilePage($unique_name)
    {
        $result = $this->db->get_where('users', array('profile_name'=>$unique_name, 'profile_public' => 'yes'));
        return $result->row();
    }

}