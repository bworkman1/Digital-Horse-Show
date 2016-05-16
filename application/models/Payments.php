<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Payments extends CI_Model
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

    public function init_payment_page($id = null)
    {
        $data['payments'] = $this->getUsersWithPayments($id);
        $data['user_selections'] = $this->sortUsersForSelection($data['payments']);


        return $data;
    }

    private function getUsersWithPayments($id)
    {
        $this->db->order_by('coach_payments.ts', 'desc');
        $this->db->select('users.profile_name, users.first_name, users.last_name, coach_payments.coach_id, coach_payments.ts, coach_payments.amount, coach_payments.notes, coach_payments.payment_groups_id, coach_payments.address, coach_payments.city, coach_payments.state, coach_payments.zip, coach_payments.payment_per_video');
        $this->db->join('users', 'coach_payments.coach_id = users.id');
        if($id) {
            $this->db->where('coach_payments.coach_id', $id);
            $result = $this->db->get('coach_payments');
            return $result->result();
        } elseif($this->ion_auth->in_group('admin')) {
            $result = $this->db->get('coach_payments');
            return $result->result();
        } else {
            return false;
        }
    }

    private function sortUsersForSelection($data)
    {
        $coach_ids = array();
        $returnData = array();
        if($data && $this->ion_auth->in_group('admin')) {
            foreach($data as $row) {

                if(!in_array($row->coach_id, $coach_ids)) {
                    $returnData[] = array(
                        'coach_name' => $row->first_name.' '.$row->last_name,
                        'user_id' => $row->coach_id
                    );
                    $coach_ids[] = $row->coach_id;
                }
            }
        }
        return $returnData;
    }

}
