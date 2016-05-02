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

    public function getUserProfileWidget($video_id, $type)
    {
        $result = $this->db->get_where('video_uploads', array('id' => $video_id));
        if($result->num_rows()>0) {
            $video = $result->row();
            if($type == 'coach') {
                $user = $this->db->get_where('users', array('id'=>$video->coach_id));
            } else {
                $user = $this->db->get_where('users', array('id' => $video->user_id));
            }
            return $user->row();
        }
        return false;
    }

    public function getUserProfilePage($unique_name)
    {
        $result = $this->db->get_where('users', array('profile_name'=>$unique_name, 'profile_public' => 'yes'));
        return $result->row();
    }

}