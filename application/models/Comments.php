<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comments extends CI_Model
{

    var $userId;

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->userId = $this->session->userdata('user_id');
    }

    public function getVideoComments($id)
    {
        $this->db->select('upload_comments.id, upload_comments.comment, upload_comments.ts, users.profile_public, users.first_name, users.last_name, users.profile_name, user_image, upload_comments.user_id');
        $this->db->order_by('upload_comments.id', 'desc');
        $this->db->where('upload_comments.video_id', $id);
        $this->db->join('users', 'upload_comments.user_id = users.id');
        $query = $this->db->get('upload_comments');
        return $query->result();
    }


    public function addComment($comment, $videoId)
    {
        $commentData = array(
            'comment' => $comment,
            'video_id' => $videoId,
            'user_id' => $this->userId,
        );
        $this->db->insert('upload_comments', $commentData);
        if($this->db->insert_id()>0) {
            $isAdmin = 'n';
            if ($this->ion_auth->in_group('admin')) {
                $isAdmin = 'y';
            }
            return array('success'=>
                array(
                    'username' => $this->session->userdata('username'),
                    'submitted' => date('m-d-Y h:i a'),
                    'comment' => $comment,
                    'image' => $this->session->userdata('user_image'),
                    'isAdmin' => $isAdmin,
                    'id' => $this->db->insert_id(),
                )
            );
        }
        return array('error'=>'Comment failed to add, try again!');
    }

    public function delete_comment($id) {
        $this->db->delete('upload_comments', array('id' => $id));
        if($this->db->affected_rows()>0) {
            return true;
        }
        return false;
    }

}