<?php
class Validation 
{
    public function check_empty($data, $fields)
    {
        $msg = null;
        foreach ($fields as $value) {
            if (empty($data[$value])) {
                $msg .= "$value field empty <br />";
            }
        } 
        return $msg;
    }
    
    public function is_age_valid($age)
    {
        //if (is_numeric($age)) {
        if (preg_match("/^[0-9]+$/", $age)) {    
            return true;
        } 
        return false;
    }
    
    public function is_email_valid($email)
    {
        //if (preg_match("/^[_a-z0-9-+]+(\.[_a-z0-9-+]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", $email)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {    
            return true;  
        }
        return false;
    }
}


function stringsantize($data){

        $filter_data = filter_var($data,FILTER_SANITIZE_STRING);
        $remove_spaces = trim($filter_data);
        $string = preg_replace("/[^a-zA-Z0-9]+/", "", html_entity_decode($remove_spaces, ENT_QUOTES));
        return $remove_backslash = stripslashes($string); 

    }

    function variable_santize($data){
       
        $remove_spaces = trim($data);
        return filter_var($remove_spaces, FILTER_SANITIZE_STRING);

    }

    function dob_sanitize($data){
     
        $filter_data = filter_var($data,FILTER_SANITIZE_STRING);
        $string = preg_replace("/[^0-9-]+/", "", html_entity_decode($filter_data, ENT_QUOTES));
        return $string;

    }

    function urlsanitize($data){
    
    return filter_var($data, FILTER_SANITIZE_URL);
    
    }


    function integersantize($data){
   
    return filter_var($data, FILTER_SANITIZE_NUMBER_INT);
    
    }


    function emailsantize($data){
    
    return filter_var($data, FILTER_SANITIZE_EMAIL);


    }

?>