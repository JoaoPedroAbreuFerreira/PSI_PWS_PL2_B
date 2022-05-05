<?php
    Class Auth
    {
        public function __construct() 
        {
            session_start();
        }
        
        public function login($user, $pass)
        {
            if($user == "JoaoFerreira" && $pass == "arroz123") 
            { 
                $_SESSION["username"] = $_POST["user"];

                return true; 
            }
            else
            {
                return false;
            } 
        }

        public function isLoggedIn()
        {
            if(isset($_SESSION["username"])) 
            { 
                return true;
            }
            else
            {
                return false;
            }
        }

        public function logout()
        {
            session_destroy();
        }
    }