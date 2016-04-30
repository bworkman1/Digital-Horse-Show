<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Communications extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function sendEmail($data)
    {
        // TODO need setup email functions here
        return true;
    }

}
