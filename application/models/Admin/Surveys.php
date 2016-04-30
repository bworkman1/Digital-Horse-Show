<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Surveys extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getRecentSurveys($limit)
    {
        $this->db->select('surveys.scorecard_id, surveys.ts, users.first_name, users.last_name');
        $this->db->group_by('surveys.survey_id');
        $this->db->limit($limit);
        $this->db->join('users', 'users.id = surveys.user_id');
        $result = $this->db->get('surveys');

        return $result->result();
    }

}