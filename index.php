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
        default: 
            require_once("./controllers/planoController.php");
            $plano = new Plano();
            $plano->index();
    }
