<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Coaches extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function getAvailableCoaches()
    {
        $result = $this->db->get_where('groups', array('name'=>'coach'));
        $coachRow = $result->row();
        $coaches = $this->ion_auth->users($coachRow->id)->result();
        $data = array();

        foreach($coaches as $coach) {
            $stats = $this->coachStats($coach->id);

            $coach->scored = $stats['scored'];
            $coach->payments = $stats['payments'];
            $coach->surveys = $this->countCoachSurveys($coach->id);
            $coach->waiting = $stats['waiting'];

            $data[] = $coach;
        }

        return $data;
    }

    public function coachOptions()
    {
        return $this->ion_auth->users(3)->result();
    }

    private function countCoachSurveys($coach_id)
    {
        $this->db->get_where('surveys', array('coach_id' => $coach_id));
        return $this->db->count_all_results();
    }

    private function coachStats($coach_id)
    {
        $data = array(
            'scored' => 0,
            'waiting' => 0,
            'payments' => 0,
        );

        $result = $this->db->get_where('video_uploads', array('coach_id'=>$coach_id));
        foreach($result->result() as $row) {
            if($row->score > 0) {
                $data['scored'] = $data['scored']+1;
                if($row->payment_id > 0) {
                    //do nothing
                } else {
                    $data['payments'] = $data['payments']+1;
                }
            } else {
                $data['waiting'] = $data['waiting']+1;
            }
        }
        return $data;
    }

}