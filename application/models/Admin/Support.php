<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Support extends CI_Model
{
    public $mError; //error string sent out to ajax

    private $mAllowedFields;
    private $mIsLoggedIn;
    private $mHasSent;

    function __construct()
    {
        parent::__construct();
        $this->setAllowedFields();
        $this->mIsLoggedIn = $this->isLoggedIn();
        $this->mHasSent = $this->session->userdata('sentSupport');
    }

    public function error_support($data)
    {

        if(!$this->mIsLoggedIn && $this->mHasSent == 'y' ) {
           $this->mError = 'You can only send one form every few hours. Create an account or login to be able to send more.';
        } else {
            if($this->cleanFields($data)) {
                $this->load->model('communications');
                if(!$this->communications->sendEmail($data)) {
                    $this->mError = 'Email failed to send, try again!';
                    return false;
                }
                $this->session->set_userdata('sentSupport', 'y');
                return true;
            } else {
                $this->mError = 'Invalid fields detected, try refreshing your page';
            }
        }
    }

    private function cleanFields($data)
    {
        foreach($data as $key => $val) {
            if(!in_array($key, $this->mAllowedFields)) {
                return false;
            }
        }
        return true;
    }


    //As you build support forms add the names to the form below
    private function setAllowedFields()
    {
        $this->mAllowedFields = array(
            'email', 'info', 'url'
        );
    }

    private function isLoggedIn()
    {
        return $this->ion_auth->logged_in();
    }

}
