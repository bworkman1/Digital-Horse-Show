<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Widgets extends CI_Model
{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->_init();
    }

    private function _init()
    {
        if (!$this->ion_auth->logged_in())
        {
            redirect('user/logout/invalidAccess');
        }
    }

    public function getRecentComments()
    {
        if($this->ion_auth->in_group('coach')) {
           $this->db->where('video_uploads.coach_id', $this->session->userdata('user_id'));
        } else {
            $this->db->where('video_uploads.user_id', $this->session->userdata('user_id'));
        }
        $this->db->join('upload_comments', 'upload_comments.video_id = video_uploads.id');
        $this->db->join('users', 'users.id = upload_comments.user_id');

        $this->db->where('upload_comments.user_id !=', $this->session->userdata('user_id'));
        $this->db->limit(10);

        $query = $this->db->get('video_uploads');

        return $query->result();
    }

    public function coachNeedsScored()
    {
        $this->db->select('users.first_name, users.last_name, users.user_image, video_uploads.id, video_uploads.uploaded');
        $this->db->join('users', 'video_uploads.user_id = users.id');
        $result = $this->db->get_where('video_uploads', array('coach_id' => $this->session->userdata('user_id'), 'star_rating'=>0));
        return $result->result();
    }

    public function coachScoredThisMonth()
    {
        $daysInMonth = date('Y-m-t');
        $lastDate = date('Y-m').'-01';

        $this->db->where('uploaded >', $lastDate);
        $this->db->where('uploaded <', $daysInMonth);
        $this->db->where('star_rating != ', '0');
        $this->db->where('coach_id', $this->session->userdata('user_id'));
        $this->db->from('video_uploads');
        $count = $this->db->count_all_results();
        return $count = ($count)?$count:0;
    }

    public function coachTicketsPurchased()
    {
        $this->db->select('credits, remaining');
        $result = $this->db->get_where('payments', array('coach_id'=>$this->session->userdata('user_id')));

        $total = 0;
        $left = 0;
        foreach($result->result() as $row) {
            $total = $total+$row->credits;
            $left = $left+$row->remaining;
        }

        return array('total' => $total, 'left' => $left);

    }

    public function getScoresForChart()
    {
        $sql = 'SELECT score, date FROM video_uploads WHERE score > 0 AND user_id = "'.$this->session->userdata('user_id').'" LIMIT 15';
        $result = $this->db->query($sql);
        $full = '';
        if($result->num_rows()>0) {
            $data = array();
            $labels = array();

            foreach ($result->result() as $row) {
                $labels[] = date('M', strtotime($row->date));
                $data[] = $row->score;
            }

            $datasets[] = array(
                'label' => 'Scores By Month',
                'fillColor' => 'rgba(213,189,228,0.2)',
                'strokeColor' => 'rgba(213,189,228,1)',
                'pointColor' => 'rgba(156, 39, 176,1)',
                'pointStrokeColor' => '#fff',
                'pointHighlightFill' => '#fff',
                'pointHighlightStroke' => 'rgba(156, 39, 176,1)',
                'data' => $data
            );

            $full = array(
                'labels' => $labels,
                'datasets' => $datasets,
            );
        }
        return $full;
    }
    
}