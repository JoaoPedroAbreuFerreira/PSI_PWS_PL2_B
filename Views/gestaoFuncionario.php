<link rel="stylesheet" type="text/css" href="public/css/afc.css">	
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

<div class="container" align="center">
<label class="ok3"><h2>Lista de utilizadores registados</h2></label>
<br>
<table class="table tablestriped">
        <thead>
            <th>
                Id
            </th>
            <th>
                Username
            </th>
            <th>
                Email
            </th> 
            <th>
                Morada
            </th>
            <th>
                Telefone
            </th>  
            <th>
                NIF
            </th> 
            <th>
                CodPostal
            </th> 
            <th>
                Localidade
            </th> 
            <th>
            </th>
        </thead>
        <tbody>
            <?php foreach ($funcionarios as $funcionario) { ?>
            <tr>
                <td><?=$funcionario->id?></td>
                <td><?=$funcionario->username?></td>
                <td><?=$funcionario->email?></td>
                <td><?=$funcionario->morada?></td>
                <td><?=$funcionario->telefone?></td>
                <td><?=$funcionario->nif?></td>
                <td><?=$funcionario->codigopostal?></td>
                <td><?=$funcionario->localidade?></td>
                <td>
                    <a href="index.php?r=user/update&i=<?=$funcionario->id?>"class="btn btn-info" 
                        role="button">Editar</a>
                    <a href="index.php?r=user/delete&i=<?=$funcionario->id?>"class="btn btn-info" 
                        role="button">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <br>
    <br>
    <a href="index.php?r=user/show&i=funcionario" class="btn btn-primary" id="coids" role="button">Registar um Funcionário</a>
    <br>
    <a href="index.php"class="btn btn-primary" id="coids" role="button">Voltar ao menu</a>