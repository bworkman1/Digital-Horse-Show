<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use Ctct\Components\Contacts\Contact;
use Ctct\ConstantContact;
use Ctct\Exceptions\CtctException;

class Test extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        define("APIKEY", "48qszs7wgu4fwxaxvhtbrutb");
        define("ACCESS_TOKEN", "jFrbTFaX542VAnZMnUrVKfbf");

        $this->load->model('Security');
        $this->output->set_template('default');
        $this->load->js('assets/themes/default/js/app/common.js');

        require('vendor/constantcontact/autoload.php');
    }

    public function index()
    {

        $cc = new ConstantContact(APIKEY);

        $contact = new Contact();
        $contact->addEmail('brian.workman43055@gmail.com');
        $contact->addList('new');
        $contact->first_name = 'Brian';
        $contact->last_name = 'Workman';
        /*
         * The third parameter of addContact defaults to false, but if this were set to true it would tell Constant
         * Contact that this action is being performed by the contact themselves, and gives the ability to
         * opt contacts back in and trigger Welcome/Change-of-interest emails.
         *
         * See: http://developer.constantcontact.com/docs/contacts-api/contacts-index.html#opt_in
         */
        $returnContact = $cc->contactService->addContact(ACCESS_TOKEN, $contact, true);

    }

}