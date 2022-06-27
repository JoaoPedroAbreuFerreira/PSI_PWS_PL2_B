<?php
require_once './vendor/autoload.php';

ActiveRecord\Config::initialize(function($cfg)
{
    $cfg->set_model_directory('./models');
    $cfg->set_connections
    (
        array
        (
            'development' => 'mysql://root@localhost/projeto_php',
        )
    );
});

define("NOME_APP", "Fatura+");
define("ROTA_LOGIN", "auth/login");
    