<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <title><?=NOME_APP?></title>
</head>
<body>
    <div class="container">
    <header>
        <br>
        <br>
    <div class="row">
    <div class="col">
        <h1><?=$empresa->designacaosocial?></h1>
        <br>
        <p>Email: <?=$empresa->email?></p>
        <p>Telefone: <?=$empresa->telefone?></p>
        <?=$empresa->localidade?>, <?=$empresa->morada?> <?=$empresa->codigopostal?>
    </div>
    <div class="col" align="right">
        <h1>Fatura</h1>
        <br>
        <p>Fatura #<?=$fatura->id?></p>
        <p>Data: <?=$fatura->datafatura->format('d/m/Y H:i:s')?></p>
        <p>NIF: <?=$empresa->nif?></p>
    </div>
    </div>
    </header>