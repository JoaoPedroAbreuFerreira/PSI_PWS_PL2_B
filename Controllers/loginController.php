<?php
require_once("./models/Auth.php");

$auth = new Auth();

if($auth->isLoggedIn())
{
    header("Location: ./index.php");
}

if(isset($_POST["user"]) && isset($_POST["pass"]))
{ 
    $valid = $auth->login($_POST["user"], $_POST["pass"]);

    if($valid == false) 
    { 
        echo "Dados Incorretos";
    }
    else
    {
        header("Location: ./index.php");
    } 
}

require_once("./views/login.php");
