<?php
require_once("./startup/boot.php");
$rota = '';
$page = "";

if(isset($_GET["r"]))
{
    $rota = $_GET["r"];
}
if(isset($_GET["p"]))
{
    $page = $_GET["p"];
}
if(isset($_GET["t"]))
{
    $table = $_GET["t"];
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
    case "load":
        require_once("./controllers/planoController.php");
        $plano = new Plano();
        $plano->load($page);
        break;
    case "register":
        switch ($table){
            case "user":
                require_once("./controllers/utilizadorController.php");
                $register = new UtilizadorController();
                $register -> clienteRegister();
                break;
            case "iva":
                require_once("./controllers/ivaController.php");
                $register = new ivaController();
                $register -> registerIva();
                break;
            case "produto":
                require_once("./controllers/produtoController.php");
                $register = new ProdutoController();
                $register -> registerproduto();
                break;
        }
        break;

    case "update":
        switch ($table){
            case "user":
                require_once("./controllers/utilizadorController.php");
                $register = new UtilizadorController();
                $register ->changeAcc();
                break;
            case "iva":
                require_once("./controllers/ivaController.php");
                $register = new ivaController();
                $register -> updateIva();
                break;
            case "produto":
                require_once("./controllers/produtoController.php");
                $register = new ProdutoController();
                $register -> updateproduto();
                break;
        }
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
