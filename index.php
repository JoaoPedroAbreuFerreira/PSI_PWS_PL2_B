<?php
require_once("./startup/boot.php");
$rota = '';

if(isset($_GET["r"]))
{
    $rota = $_GET["r"];
}

switch ($rota)
{
    case "auth/login": 
        require_once("./controllers/AuthController.php");
        $authController = new AuthController();
        $authController->login(); 
        break;
    case "auth/logout": 
        require_once("./controllers/AuthController.php");
        $authController = new AuthController();
        $authController->logout();
        break;
    case "account/settings":
        require_once("./controllers/planoController.php");
        $plano = new Plano();
        $plano->settings();
        break;
    case "change/acc":
        require_once("./controllers/settingsController.php");
        $settings = new Settings();
        $settings-> changeAcc();
        break;
    default: 
        require_once("./controllers/planoController.php");
        $plano = new Plano();
        $plano->index();
}
