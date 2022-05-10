<?php

function login($user, $pass)
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

function isLoggedIn()
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