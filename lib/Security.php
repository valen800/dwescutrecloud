<?php
class Security
{
    public static function isAllowed()
    {
        if (session_id() == "") {
            session_start();
        }

        if (isset($_SESSION['autenticado']) && $_SESSION['autenticado']) {
            return true;
        } else {
            return false;
        }
    }

    public static function isValidUser($email, $password){
        if($email == 'xulioxesus@gmail.com' && $password = '123'){
            return true;
        }
        else{
            return false;
        }
    }

    public static function setAllowedUser($value){

        if (session_id() == "") {
            session_start();
        }

        if ($value === true){
            $_SESSION['autenticado'] = true;
        }
        else{
            $_SESSION['autenticado'] = false;
        }
    }
}
