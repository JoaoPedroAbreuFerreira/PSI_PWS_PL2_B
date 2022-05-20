<h2>Lista de utilizadores registados</h2>

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
                    <a href="index.php?r=user/update&i=<?=$funcionario->id?>" class="btn btn-info"
                        role="button">Editar</a>
                    <a href="index.php?r=user/delete&i=<?=$funcionario->id?>" class="btn btn-warning"
                        role="button">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <br>
    <br>

    <a href="index.php?r=user/show&i=funcionario"> Registar um Funcionário</a>
    <br>
    <br>
    <a href="index.php">Voltar ao menu</a>