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

    public function waitingToBeScored($id)
    {
        $result = $this->db->get_where('video_uploads', array('coach_id'=>$id, 'score' => NULL));
        return count($result->result());
    }

    public function payments($id)
    {
        $this->db->select_sum('amount');
        $this->db->where('coach_id', $id);
        $query = $this->db->get('coach_payments');
        $money = $query->row();
        if($money->amount) {
            return number_format($money->amount, 2);
        } else {
            return '0.00';
        }
    }

    public function waitingApproval($id)
    {
        $result = $this->db->get_where('video_uploads', array('coach_id'=>$id, 'payment_id' => '0'));
        return count($result->result());
    }

    public function coachNeedsScored($limit = false)
    {
        if($limit) {
            $this->db->limit($limit);
        }
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

    public function getCoachVideosChart()
    {
        $sql = 'SELECT DATE_FORMAT(uploaded, "%Y-%m-%d") AS Month, COUNT(uploaded) AS videos FROM video_uploads GROUP BY DATE_FORMAT(uploaded, "%Y-%m") LIMIT 12';
        $result = $this->db->query($sql);
        $full = '';
        if($result->num_rows()>0) {
            $data = array();
            $labels = array();

            foreach ($result->result() as $row) {
                $labels[] = date('M', strtotime($row->Month));
                $data[] = $row->videos;
            }

            $datasets[] = array(
                'label' => 'Videos By Month',
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

    public function getWhatsNewData()
    {
        $this->db->limit(10);
        $result = $this->db->get('whats_new');
        return $result->result();
    }

    public function specialOffers()
    {
        $this->db->limit(10);
        $result = $this->db->get('special_offers');
        return $result->result();
    }

    public function getUsersRemainingCredits($id)
    {
        $this->db->select('coaching_credits');
        $result = $this->db->get_where('users', ['id' => $id]);
        return $result->row();
    }

    public function getUserPointsSum($id)
    {
        $this->db->select_sum('star_rating');
        $this->db->where('user_id', $id);
        $result = $this->db->get('video_uploads');
        return $result->row();
    }

}