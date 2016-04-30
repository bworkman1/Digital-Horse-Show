<?php
class Create_users extends CI_Model
{


    public function __construct()
    {
        parent::__construct();
    }

    public function genUsername( $min, $max, $case_sensitive = false )
    {
        // Set length
        $length = rand($min, $max);

        // Set allowed chars (And whether they should use case)
        if ( $case_sensitive )
        {
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        }
        else
        {
            $chars = "abcdefghijklmnopqrstuvwxyz";
        }

        // Get string length
        $chars_length = strlen($chars);

        // Create username char for char
        $username = "";

        for ( $i = 0; $i < $length; $i++ )
        {
            $username .= $chars[mt_rand(0, $chars_length)];
        }

        return $username;

    }
}