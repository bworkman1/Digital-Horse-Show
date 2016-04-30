<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Format_data extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function formatPhone($phone)
    {
        if($phone) {
            $phone = "(".substr($phone, 0, 3).") ".substr($phone, 3, 3)."-".substr($phone,6);
        }
        return $phone;
    }

    public function formatDate($date)
    {
        if($date) {
            $date = date('m-d-Y h:i a', strtotime($date));
        }
        return $date;
    }

}