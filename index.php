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
        $plano->load("settings");
        break;
    case "account/create":
        require_once("./controllers/planoController.php");
        $plano = new Plano();
        $plano->load("register");
        break;
    case "change/acc":
        require_once("./controllers/settingsController.php");
        $settings = new Settings();
        $settings-> changeAcc();
        break;
    case "register/acc":
        require_once("./controllers/settingsController.php");
        $settings = new Settings();
        $settings-> clienteRegister();
        break;
    case "gestao/iva":
        require_once("./controllers/planoController.php");
        $plano = new Plano();
        $plano->load("iva");
        break;
    default: 
        require_once("./controllers/planoController.php");
        $plano = new Plano();
        $plano->index();
}
