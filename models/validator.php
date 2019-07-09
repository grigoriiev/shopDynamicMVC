<?php

session_start();
class Validator
{
    public $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function checkAdminProduct($data, $image)
    {
        $valid = true;
        foreach ($data as $key => $value) {
            if (empty($value)) {
                $valid = false;
            }
        }
   
        foreach ($data as $key => $value) {
            if (empty($value)) {
                $valid = false;
            }
        }
        return $valid;
    }
    public function checkLogin()
    {
        if ($_SESSION["user"]["admin"] == 1) {
            setcookie("failedLogin", "", time() - 3600, "/");
            header("Location: /template/admin");
        } else if ($_SESSION["user"]) {
            setcookie("failedLogin", "", time() - 3600, "/");
            header("Location: /template/product");
        } else {
            setcookie("failedLogin", "true",  time() + 3600, "/");
            header("Location: /");
        }
    }






    public function  checkRegistration($table, $login, $email, $telefon, $password, $reapetPassword)
    {
        $login_taken = false;
        $email_taken = false;
        $tel_taken = false;
      
        $users = $this->db->all($table);
        foreach ($users as $key => $value) {
            if ($login == $value["login"]) {
                $login_taken = true;
            }
            if ($email == $value["email"]) {
                $email_taken = true;
            }
            if ($telefon == $value["tel"]) {
                $email_taken = true;
            }
        }
        if (!$login_taken && !$email_taken && !$tel_taken && $password == $reapetPassword) {
            if ($_COOKIE["LoginTaken"]) {
                setcookie("LoginTaken", "", time() - 3600, "/");
            }
            if ($_COOKIE["EmailTaken"]) {
                setcookie("EmailTaken", "", time() - 3600);
            }
            if ($_COOKIE["EmailLoginTaken"]) {
                setcookie("EmailLoginTaken", "", time() - 3600, "/");
            }
            if ($_COOKIE["TelTaken"]) {
                setcookie("TelTaken", "", time() - 3600, "/");
            }
            if ($_COOKIE["TelEmailLoginTaken"]) {
                setcookie("TelEmailLoginTaken", "", time() - 3600, "/");
            }

            if ($_COOKIE["TelLoginTaken"]) {
                setcookie("TelLoginTaken", "", time() - 3600, "/");
            }
            if ($_COOKIE["EmailTelTaken"]) {
                setcookie("EmailTelTaken", "", time() - 3600, "/");
            }
            if ($_COOKIE["InvalidePassworld"]) {
                setcookie("InvalidePassworld", "", time() - 3600, "/");
            }
            return true;

            
        } else if ($login_taken && !$email_taken && !$tel_taken) {
            setcookie("LoginTaken", "true", "/");
            if ($password != $reapetPassword) {
                setcookie("InvalidePassworld", "true", "/");
            }
           
            return false;
          


        } else if ($email_taken && !$login_taken && !$tel_taken) {
            setcookie("EmailTaken", "true", "/");
            if ($password != $reapetPassword) {
                setcookie("InvalidePassworld", "true", "/");
            }
            
            return false;
         


        } else if ($email_taken && $login_taken && !$tel_taken) {
            setcookie("EmailLoginTaken", "true", "/");
            if ($password != $reapetPassword) {
                setcookie("InvalidePassworld", "true", "/");
            }
         
            return false;
          


        } else if (!$email_taken && !$login_taken && $tel_taken) {

            setcookie("TelTaken", "true", "/");
            if ($password != $reapetPassword) {
                setcookie("InvalidePassworld", "true", "/");
            }
           
            return false;
          

        } else if ($email_taken && $login_taken && $tel_taken) {

            setcookie("TelEmailLoginTaken", "true", "/");
            if ($password != $reapetPassword) {
                setcookie("InvalidePassworld", "true", "/");
            }
           
            return false;
           

        } else if (!$email_taken && $login_taken && $tel_taken) {

            setcookie("TelLoginTaken", "true", "/");
            if ($password != $reapetPassword) {
                setcookie("InvalidePassworld", "true", "/");
            }
            return false;
            

        } else if ($email_taken && !$login_taken && $tel_taken) {

            setcookie("EmailTelTaken", "true", "/");
            if ($password != $reapetPassword) {
                setcookie("InvalidePassworld", "true", "/");
            }
            return false;
           

        }
    }
}
