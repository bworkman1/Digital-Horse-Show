<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_videos extends CI_Model
{

    var $currentUserId; // set in construct
    public $mVideoLimit = 24;

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->user = $this->session->userdata('user_id');
    }

    public function getUsersVideos($id, $page = 0)
    {
        $sortBy = $this->session->userdata('video_sort');
        switch ($sortBy) {
            case 'id':
                $this->session->unset_userdata('video_sort');
                $this->db->order_by('video_uploads.id', 'desc');
                break;
            case 'star_rating':
                $this->db->order_by('video_uploads.star_rating', 'desc');
                break;
            case 'size':
                $this->db->order_by('video_uploads.size', 'desc');
                break;
            case 'client_name':
                $this->db->order_by('video_uploads.client_name', 'asc');
                break;
            case 'oldest':
                $this->db->order_by('video_uploads.id', 'asc');
                break;
            default:
                $this->db->order_by('video_uploads.id', 'desc');
                break;
        }

        $this->db->limit($this->mVideoLimit, $page);
        $query = $this->db->get_where('video_uploads', array('video_uploads.user_id' => $id));

        return $query->result();
    }

    public function getAllUserUploads($page = 0)
    {
        $sortBy = $this->session->userdata('video_sort');
        switch ($sortBy) {
            case 'id':
                $this->session->unset_userdata('video_sort');
                $this->db->order_by('video_uploads.id', 'desc');
                break;
            case 'star_rating':
                $this->db->order_by('video_uploads.star_rating', 'desc');
                break;
            case 'size':
                $this->db->order_by('video_uploads.size', 'desc');
                break;
            case 'client_name':
                $this->db->order_by('video_uploads.client_name', 'asc');
                break;
            case 'oldest':
                $this->db->order_by('video_uploads.id', 'asc');
                break;
            default:
                $this->db->order_by('video_uploads.id', 'desc');
                break;
        }

        $this->db->limit($this->mVideoLimit, $page);
        $query = $this->db->get('video_uploads');

        return $query->result();
    }

    public function countUserUploads($id)
    {
        $this->db->where('user_id', $id);
        $this->db->from('video_uploads');
        return $this->db->count_all_results();
    }

    public function countAllUploads()
    {
        $this->db->from('video_uploads');
        return $this->db->count_all_results();
    }

    public function getPreviousVideo($id)
    {
        $this->db->select('id');
        $this->db->where('id <', $id);
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->limit(1);
        return $this->db->get('video_uploads')->row();
    }

    public function getNextVideo($id)
    {
        $this->db->select('id');
        $this->db->where('id >', $id);
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->limit(1);
        return $this->db->get('video_uploads')->row();
    }

    private function countVideoComments($video_id)
    {
        $this->db->where('video_id', $video_id);
        $this->db->from('upload_comments');
        return $this->db->count_all_results();
    }

    public function getVideo($id)
    {
        $this->db->join('users', 'users.id = video_uploads.user_id');
        $query = $this->db->get_where('video_uploads', array('video_uploads.id' => $id));
        return $query->row();
    }

    public function getRelatedVideos($videoId, $userId)
    {
        $this->db->select('id, client_name, thumb');
        $this->db->limit(5);
        $query = $this->db->get_where('video_uploads', array('id !=' => $videoId, 'user_id' => $userId));
        $data = $query->result();
        return $data;
    }

    public function getRelatedScores($video_id)
    {
        //$result = $this->db->get_where('scoring', array('video_id' => $video_id));
        //return $result->row();
    }

    public function getGradedVideos($user_id, $limit = null, $viewed = false)
    {
        if($limit) {
            $this->db->limit($limit);
        }
        if($viewed) {
            $this->db->where('video_uploads.user_viewed', NULL);
        }
        $this->db->select('video_uploads.id AS video_id, video_uploads.uploaded, users.first_name, users.last_name, video_uploads.scorecard_id, score_cards.max_score, video_uploads.score, video_uploads.client_name, video_uploads.uploaded, score_cards.option_name');
        $this->db->join('score_cards', 'score_cards.id = video_uploads.scorecard_id');
        $this->db->join('users', 'video_uploads.coach_id = users.id');
        $this->db->where('video_uploads.score >', '0');
        $this->db->order_by('video_uploads.id', 'desc');
        $result = $this->db->get_where('video_uploads', array('video_uploads.user_id'=>$user_id));

        return $result->result();

    }

}
