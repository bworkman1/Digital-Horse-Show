<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payments extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function needsPaid($coach_id)
    {
        $this->db->where('star_rating >', 0);
        $this->db->where('score >', 0);
        return $this->db->get_where('video_uploads', array('coach_id' => $coach_id, 'payment_id' => 0))->result();
    }

    public function paid($coach_id)
    {

    }

    public function makePayment($data)
    {
        $video_ids = '';
        foreach($data['video_id'] as $v) {
            $video_ids .= $v.'|';
        }
        $video_ids = rtrim($video_ids, '|');

        $insert = array(
            'payment_groups_id'  => $video_ids,
            'amount'            => $data['total'],
            'notes'             => $data['notes'],
            'address'           => $data['address'],
            'city'              => $data['city'],
            'state'             => $data['state'],
            'zip'             => $data['zip'],
            'payment_per_video' => $data['per_video'],
        );

        $this->db->insert('coach_payments', $insert);
        if($this->db->insert_id()>0) {
            $this->updateVideoPaymentId($data['video_id'], $this->db->insert_id());
            $this->notifiyCoachOfPayment($data);
            $this->session->set_flashdata('success', 'Payment saved successfully');
            return array('success'=>base_url('admin/view/all-payments'));
        } else {
            return array('error'=>'Failed to save payment, try again');
        }
    }

    public function getAllCoachPayments($coach_id)
    {
        $this->db->join('users', 'users.id = coach_payments.coach_id');
        $result = $this->db->get_where('coach_payments', array('coach_payments.coach_id'=>$coach_id));
        return $result->result();
    }

    private function updateVideoPaymentId($ids, $payment_id)
    {
        foreach($ids as $id) {
            $this->db->where('id', $id);
            $this->db->update('video_uploads', array('payment_id'=> $payment_id));
        }
    }

    private function notifiyCoachOfPayment($data)
    {
        //TODO: email coach the payment details
    }

}