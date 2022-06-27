<?php
Class Auth
{
    public function __construct() 
    {
        session_start();
    }
    
    public static function login($user, $pass)
    {
        $valid = new Utilizador();

        if($valid->searchUtilizador($user, $pass)) 
        {
            $_SESSION["username"] = trim($user);
            $_SESSION["password"] = $pass;

            return true; 
        }
        else
        {
            return false;
        } 
    }

    public static function getRole()
    {
        if(isset($_SESSION["username"]))
        {
            $user = Utilizador::find_by_username($_SESSION["username"]);
            return $user->role;
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