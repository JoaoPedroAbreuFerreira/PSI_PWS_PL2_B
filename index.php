<?php
require_once("./startup/boot.php");
require_once("./controllers/AuthController.php");
require_once("./controllers/UtilizadorController.php");
require_once("./controllers/IvaController.php");
require_once("./controllers/ProdutoController.php");
require_once("./controllers/EmpresaController.php");
require_once("./controllers/FaturaController.php");

$authController = new AuthController();
$userController = new UtilizadorController();
$ivaController = new IvaController();
$produtoController = new ProdutoController();
$empresaController = new EmpresaController();
$faturaController = new FaturaController();

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

     //funçoes de utilizador
     case "user/index":
        $userController->index();
        break;

    case "user/gestao":
        $userController->gestao();
        break;

    case "user/show":
        $userController->show($index/* user type*/);
        break;

    case "user/create":
        $userController->create($index/* user type*/);
        break;

    case "user/delete":
        $userController->delete($index);
        break;

    case "user/update":
        $userController->update($index);
        break;

    case "user/change":
        $userController->change();
        break;

    case "user/edit":
        $userController->edit($index);
        break;

    //funçoes de empresa
    case "empresa/index":
        $empresaController->index();
        break;

    case "empresa/edit":
        $empresaController->edit();
        break;

    case "empresa/update":
        $empresaController->update();
        break;

    //funçoes de fatura
    case "fatura/index":
        $faturaController->index($index);
        break;

    case "fatura/show":
        $faturaController->show();
        break;

    case "fatura/create":
        $faturaController->create();
        break;

    case "fatura/print":
        $faturaController->print($index);
        break;

    case "fatura/update":
        $faturaController->update($index);
        break;

    case "fatura/delete":
        $faturaController->delete($index);
        break;

    default:
        $userController->index();
        
}
