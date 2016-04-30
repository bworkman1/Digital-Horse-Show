<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_users extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function getUsers($page, $perPage)
    {
        $this->db->limit($page, $perPage);
        $this->db->where('id !=', $this->session->userdata('user_id'));
        $result = $this->db->get('users');
        $data['users'] = $result->result();
        $data['total_rows'] = $this->db->count_all('users');

        return $data;
    }

    public function getUser($id)
    {
        $query = $this->db->get_where('users', array('id'=>$id));
        return $query->row();
    }

    public function searchUser($search, $limit, $fields = false, $isAdmin = false)
    {
        $search_array = explode(' ', $search);
        $this->db->limit($limit);
        if($fields) {
            $this->db->select($fields);
        }
        foreach($search_array as $val) {
            $this->db->or_like('first_name', $val);
            $this->db->or_like('last_name', $val);
        }

        if(!$isAdmin) {
            $this->db->where('profile_public', 'yes');
        }

        $result = $this->db->get('users');
        return $result->result();
    }

    public function getUserByProfileName($profileName)
    {
        $query = $this->db->get_where('users', array('profile_name'=>$profileName));
        return $query->row();
    }

}