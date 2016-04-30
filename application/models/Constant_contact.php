<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use Ctct\Components\Contacts\Contact;
use Ctct\ConstantContact;
use Ctct\Exceptions\CtctException;

class Constant_contact extends CI_Model
{


    function __construct()
    {
        parent::__construct();
        _init();
    }

    private function _init()
    {
        define("APIKEY", "48qszs7wgu4fwxaxvhtbrutb");
        define("ACCESS_TOKEN", "jFrbTFaX542VAnZMnUrVKfbf");
    }



}
