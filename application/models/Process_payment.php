<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Process_payment extends CI_Model
{
    public $mError, $mSuccess;

    private $mTransId, $mApprovalCode;

    function __construct()
    {
        parent::__construct();
        $this->_init();
    }

    private function _init()
    {
        $this->load->library('Authorize_net');
    }

    public function process($data)
    {
        $nameArray = explode(' ', $data['card_name']);
        $auth_net = array(
            'x_card_num' => preg_replace("/[^0-9,.]/", "", $data['card_number']),
            'x_exp_date' => $data['expiry_month'].'/'.substr($data['expiry_year'], 2),
            'x_card_code' => '123',
            'x_description' => $data['coaching_credits'] . ' Coaching Credits',
            'x_amount' => $data['total'],
            'x_first_name' => $nameArray[0],
            'x_last_name' => end($nameArray),
            'x_email' => $this->session->userdata('email'),
            'x_customer_ip' => $this->input->ip_address(),
        );
        $this->authorize_net->setData($auth_net);

        if ($this->authorize_net->authorizeAndCapture()) {
            $this->mTransId = $this->authorize_net->getTransactionId();
            $this->mApprovalCode = $this->authorize_net->getApprovalCode();

            $this->logPayment($data);
            $this->sendThankYouEmail();
            if($this->updateUsersCredits($data)) {
                $this->mSuccess = 'Your payment was successful, we emailed you the details of the transaction.';
                return true;
            } else {
                $this->mError = 'Your card was successfully charged but credits failed to add to your account. Contact support and let us know and reference '.$this->mTransId.'.';
                return false;
            }
        } else {
            $this->mError = $this->authorize_net->getError();
            return false;
        }
    }

    public function checkTotalAmount($total, $credits)
    {
        $this->load->model('admin/admin_settings');
        $admin_settings = $this->admin_settings->getSetting('coaching_credits');

        $calculated_total = number_format(($credits * $admin_settings->value), 2);
        if($calculated_total != $total) {
            return false;
        }
        return true;
    }

    private function logPayment($data)
    {
        $log = array(
            'trans_id'      => $this->mTransId,
            'approval_code' => $this->mApprovalCode,
            'paid_on'       => date('Y-m-d H:i:s'),
            'amount'        => $data['total'],
            'user_id'       => $this->session->userdata('user_id'),
            'credits'       => $data['coaching_credits'],
        );
        $this->db->insert('payments', $log);
    }

    private function updateUsersCredits($data)
    {
        $user = $this->ion_auth->user()->row();
        $total = $user->coaching_credits + $data['coaching_credits'];
        $this->db->where('id', $this->session->userdata('user_id'));
        $this->db->update('users', array('coaching_credits'=>$total));
        if($this->db->affected_rows()>0) {
            return true;
        } else {
            return false;
        }
    }

    private function sendThankYouEmail()
    {
        //TODO: Need to add this so that it sends the user an email thanking them for their purchase - use communications to send email
    }

    public function getUsersPayments($id)
    {
        $this->db->order_by('payments.id', 'desc');
        $this->db->join('users', 'payments.coach_id = users.id');
        $result = $this->db->get_where('payments', array('payments.user_id' => $id));
        return $result->result();
    }

}