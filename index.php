<?php
require_once("./startup/boot.php");
require_once("./controllers/AuthController.php");
require_once("./controllers/PlanoController.php");
require_once("./controllers/UtilizadorController.php");
require_once("./controllers/IvaController.php");
require_once("./controllers/ProdutoController.php");
require_once("./controllers/DBController.php");


$authController = new AuthController();
$planoController = new Plano();  
$userController = new UtilizadorController();
$ivaController = new IvaController();
$produtoController = new ProdutoController();
$dbController = new DBController();

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
        $authController->login(); 
        break;

    case "auth/logout":
        $authController->logout();
        break;

    case "load":
        $planoController->load($page);
        break;

    case "register":
        switch ($table)
        {
            case "Cliente":
                $userController->clienteRegister();
                break;
            
            case "Funcionário":
                $userController->funcionarioRegister();
                break;

            case "iva":
                $ivaController->registerIva();
                break;

            case "produto":
                $produtoController->registerproduto();
                break;
        }
        break;

    case "update":
        switch ($table)
        {
            case "user":
                $userController->changeAcc();
                break;

            case "iva":
                $ivaController->updateIva();
                break;

            case "produto":
                $produtoController->updateproduto();
                break;
            
            case "funcionario":
                $userController->funcionarioUpdate();
                break;
        }
        break;

    case"db/delete":
        $dbController->deleteData();
        break;

    default:
        $planoController->index();
}
