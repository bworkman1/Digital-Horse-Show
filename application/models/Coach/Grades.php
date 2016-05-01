<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grades extends CI_Model
{
    public $mError;

    function __construct()
    {
        parent::__construct();
    }

    public function isValidCoach($id)
    {
        $result = $this->db->get_where('video_uploads', array('coach_id' => $this->session->userdata('user_id'), 'id' => $id));
        if ($result->num_rows() > 0) {
            return true;
        }
        return false;
    }

    public function submitGrade($data, $video_id)
    {
        $videoData = $this->getVideoData($video_id);

        $insertData = array();
        for($i=0; $i<count($data['id']);$i++) {

            $cardData = $this->getScorecardSection($data['id'][$i], 'scorecard_sections_7');

            if(empty($cardData)) {
                $this->mError = 'Error Saving Scorecard, Try refreshing the page and trying again';
                return false;
            }

            $insert = array(
                'letters'       => $cardData->letters,
                'test'          => $cardData->test,
                'directive'     => $cardData->directive,
                'points'        => $data['points'][$i],
                'co_effecient'  => $data['co_effecient'][$i],
                'video_id'      => $video_id,
                'divider'       => $data['divider'][$i],
                'card_id'       => $cardData->card_id,
                'remarks'       => $data['remarks'][$i]
            );

            $insertData[] = $insert;
        }

        if(count($insertData) == count($data['id'])) {
            $cardInfo = $this->db->get_where('score_cards', array('id'=>$videoData->scorecard_id))->row();

            $this->db->insert_batch('scorecard_sections_7_scores', $insertData);
            $videoData  = array(
                'star_rating'   => $this->setVideoStarRank($data['total'], $cardInfo->max_score),
                'score'         => $data['total'],
                'score_errors'  => $data['errors']
            );

            $this->db->where('id', $video_id);
            $this->db->update('video_uploads', $videoData);

            $this->session->set_flashdata('success', 'The users video has been scored, and they have been notified.');

            $this->load->model('Communications');

            //TODO Format this so that it send emails
            $this->Communications->sendEmail($videoData);

            $feedback = array('success' => 'Scorecard saved');
        } else {
            $feedback = array('error' => 'Something went wrong saving the data, if this keeps happening contact support.');
        }

        return $feedback;
    }

    private function getVideoData($id)
    {
        $result = $this->db->get_where('video_uploads', array('id' => $id));
        return $result->row();
    }

    public function setVideoStarRank($total, $max_score)
    {
        $stepPoints = ($max_score/5);
        $stars = 1;
        for($i=1;$i<6;$i++) {
            if($total>($stepPoints*$i)) {
                $stars++;
            }
        }
        return $stars;
    }

    public function getScoreCard($video_id)
    {
        if ($this->ion_auth->in_group('coach')) {
            $this->db->where('coach_id', $this->session->userdata('user_id'));
        } else {
            $this->db->where('user_id', $this->session->userdata('user_id'));
        }
        $this->db->where('video_id', $video_id);
        $result = $this->db->get('scoring');
        return $result->row();
    }

    public function needsGraded($coach_id)
    {
        $this->db->order_by('id', 'desc');
        $result = $this->db->get_where('video_uploads', array('coach_id' => $coach_id, 'star_rating' => 0));
        return $result->result();
    }

    public function getUserOptions()
    {
        $lvls = array();
        $data = array();
        $this->db->order_by('option_name');
        $result = $this->db->get('score_cards');
        foreach ($result->result() as $row) {
            if (!in_array($row->child_of, $lvls)) {
                $lvls[] = $row->child_of;
                $data['lvls'][] = $row->child_of;
            }

            $data['options'][] = array(
                'parent' => $row->child_of,
                'name' => $row->option_name,
                'id' => $row->id
            );

        }

        sort($data['lvls']);

        return $data;
    }

    public function getUsersScorecard($scorecard_id)
    {
        $data = array();

        $data['scorecard'] = $this->db->get_where('score_cards', array('id'=>$scorecard_id))->row();
        $data['sections'] = $this->db->get_where('scorecard_sections_7', array('card_id'=>$scorecard_id))->result();

        return $data;
    }

    private function getScorecardSection($id, $table)
    {
        return $this->db->get_where('scorecard_sections_7', array('id'=> $id))->row();
    }

    public function getGradedCard($video_id)
    {
        $this->db->select('video_uploads.*, users.first_name, users.last_name, users.user_image, users.profile_name, users.created_on, users.profile_public');
        $this->db->join('users', 'users.id = video_uploads.user_id');
        $video = $this->db->get_where('video_uploads', array('video_uploads.id' => $video_id))->row();

        $scorecard = $this->db->get_where('score_cards', array('id' => $video->scorecard_id))->row_array();
        $coach = $this->db->get_where('users', array('id'=>$video->coach_id))->row();
        $scores = $this->db->get_where('scorecard_sections_7_scores', array('video_id'=>$video->id, 'card_id'=>$video->scorecard_id))->result();

        if($this->session->userdata('user_id')==$video->user_id && (empty($video->user_viewed) || $video->user_viewed == '0000-00-00 00:00:00')){
            $this->updateUserViewed($video->id);
        }

        $data = array(
            'video'     => $video,
            'scorecard' => $scorecard,
            'scores'    => $scores,
            'coach'     => $coach,
        );

        return $data;
    }

    public function updateUserViewed($video_id)
    {
        $this->db->where('id', $video_id);
        $this->db->update('video_uploads', array('user_viewed'=>date('Y-m-d H:i:s')));
    }

}