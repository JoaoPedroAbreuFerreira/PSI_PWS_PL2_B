<h2>Lista de Empresas registados</h2>

<table class="table tablestriped">
        <thead>
            <th>
                Id
            </th>
            <th>
                designacaoSocial
            </th>
            <th>
                email
            </th> 
            <th>
                telefone
            </th> 
            <th>
                nif
            </th> 
            <th>
                morada
            </th> 
            <th>
                codigo postal
            </th> 
            <th>
                localidade
            </th> 
            <th>
                capitalSocial
            </th> 
        </thead>
        <tbody>
            <?php foreach ($empresas as $empresa) { ?>
            <tr>
                <td><?=$empresa->id?></td>
                <td><?=$empresa->designacaosocial?></td>
                <td><?=$empresa->email?></td>
                <td><?=$empresa->telefone?></td>
                <td><?=$empresa->nif?></td>
                <td><?=$empresa->morada?></td>
                <td><?=$empresa->codigopostal?></td>
                <td><?=$empresa->localidade?></td>
                <td><?=$empresa->capitalsocial?></td>
                <td>
                    <a href="index.php?r=load&p=updateEmpresa&i=<?= $empresa->id?>" class="btn btn-info"
                        role="button">Editar</a>
                    <a href="index.php?r=db/delete&t=empresa&i=<?=$empresa->id?>" class="btn btn-warning"
                        role="button">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <br>
    <br>

    <a href="index.php?r=load&p=registerEmpresa"> Registar uma Empresa</a>
    <br>
    <br>
    <a href="index.php">Voltar ao menu</a>