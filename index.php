<?php
require_once("./startup/boot.php");
$rota = '';

if(isset($_GET["r"]))
{
    $rota = $_GET["r"];
}
if(isset($_GET["a"]))
{
    $what = $_GET["a"];
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
    case "create":
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
    case "register/iva":
        require_once("./controllers/settingsController.php");
        $settings = new Settings();
        $settings-> registerIva();
        break;
    case"db/delete":
        require_once("./controllers/DBController.php");
        $settings = new DBController();
        $settings-> deleteData();
        break;
    default: 
        require_once("./controllers/planoController.php");
        $plano = new Plano();
        $plano->index();
}
