<?php
class MY_Form_validation extends CI_Form_validation
{
    function __construct($config = array())
    {
        parent::__construct($config);
    }

    function error_array()
    {
        if (count($this->_error_array) === 0)
            return FALSE;
        else
            $error = [];
            foreach($this->_error_array as $key => $val) {
                $error[] = [
                    'field' => $key,
                    'error' => $val,
                ];
            }
            return $error;
    }
}