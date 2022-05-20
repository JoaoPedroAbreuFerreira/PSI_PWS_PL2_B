<?php
require_once("./startup/boot.php");
require_once("./controllers/AuthController.php");
require_once("./controllers/PlanoController.php");
require_once("./controllers/UtilizadorController.php");
require_once("./controllers/IvaController.php");
require_once("./controllers/ProdutoController.php");
require_once("./controllers/DBController.php");
require_once("./controllers/EmpresaController.php");


$authController = new AuthController();
$planoController = new Plano();  
$userController = new UtilizadorController();
$ivaController = new IvaController();
$produtoController = new ProdutoController();
$dbController = new DBController();
$empresaController = new EmpresaController();

$rota = '';
$page = "";

if(isset($_GET["r"]))
{
    $rota = $_GET["r"];
}

if(isset($_GET["i"]))
{
    $index = $_GET["i"];
}


switch ($rota)
{
    case "auth/login":
        $authController->login(); 
        break;

    case "auth/logout":
        $authController->logout();
        break;

    case "load":
        $planoController->load($page);
        break;

        //funçoes de iva

    case "iva/index":
        $ivaController->index();
        break;

    case "iva/show":
        $ivaController->show();
        break;

    case "iva/create":
        $ivaController->create();
        break;

    case "iva/delete":
        $ivaController->delete($index);
        break;

    case "iva/update":
        $ivaController->update($index);
        break;

    case "iva/edit":
        $ivaController->edit($index);
        break;

     //funçoes de produtos

     case "produto/index":
        $produtoController->index();
        break;

    case "produto/show":
        $produtoController->show();
        break;

    case "produto/create":
        $produtoController->create();
        break;

    case "produto/delete":
        $produtoController->delete($index);
        break;

    case "produto/update":
        $produtoController->update($index);
        break;

    case "produto/edit":
        $produtoController->edit($index);
        break;
    

    default:
        $planoController->index();
}
