<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Widgets extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function newUsersThisMonth()
    {
        $date = strtotime('-30 days');
        $this->db->select('users.id');
        $this->db->where('users_groups.group_id', 2);
        $this->db->where('users.created_on >', $date);
        $this->db->join('users_groups', 'users.id = users_groups.user_id');
        $this->db->from('users');
        return $this->db->count_all_results();
    }

    public function newCoachesThisMonth()
    {
        $date = strtotime('-30 days');
        $this->db->select('users.id');
        $this->db->where('users_groups.group_id', 3);
        $this->db->where('users.created_on >', $date);
        $this->db->join('users_groups', 'users.id = users_groups.user_id');
        $this->db->from('users');
        return $this->db->count_all_results();

    }

    public function getSales30Days()
    {
        $date = date('Y-m-d', strtotime('-30 days'));

        $this->db->where('paid_on >',  $date);
        $this->db->select_sum('amount');
        $result = $this->db->get('payments');
        return $result->row();
    }

    public function getRecentUploads($limit)
    {
        $this->db->select('video_uploads.id, users.first_name, users.last_name, video_uploads.uploaded');
        $this->db->limit($limit);
        $this->db->order_by('id', 'desc');
        $this->db->join('users', 'users.id = video_uploads.user_id');
        $result = $this->db->get('video_uploads');
        return $result->result();
    }

    public function getSalesForGraph()
    {
        $sql = 'SELECT DATE_FORMAT(paid_on, "%Y-%m-%d") AS Month, SUM(amount) AS Amount FROM payments GROUP BY DATE_FORMAT(paid_on, "%Y-%m") LIMIT 12';
        $result = $this->db->query($sql);

        $data = array();
        $labels = array();

        foreach($result->result() as $row) {
            $labels[] = date('M', strtotime($row->Month)).' $';
            $data[] = number_format($row->Amount, 2, '.', '');
        }

        $datasets[] = array(
            'label' => 'Sales By Month',
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

        return $full;
    }
}