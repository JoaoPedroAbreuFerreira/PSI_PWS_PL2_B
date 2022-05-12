<?php
require_once("./startup/boot.php");
require_once("./controllers/AuthController.php");
require_once("./controllers/planoController.php");
require_once("./controllers/settingsController.php");

$rota = '';

$authController = new AuthController();
$plano = new Plano();
$settings = new Settings();

if(isset($_GET["r"]))
{
    $rota = $_GET["r"];
}

switch ($rota)
{
    case "auth/login": 
        $authController->login(); 
        break;

    case "auth/logout": 
        $authController->logout();
        break;

    case "account/settings":
        $plano->settings();
        break;

    case "change/acc":
        $settings-> changeAcc();
        break;

    default: 
        $plano->index();
}
