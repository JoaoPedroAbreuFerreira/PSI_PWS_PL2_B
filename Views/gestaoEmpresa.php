<h2>Lista de Empresas registados</h2>

<table class="table tablestriped">
        <thead>
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
            <tr>
                <td><?=$empresa->designacaosocial?></td>
                <td><?=$empresa->email?></td>
                <td><?=$empresa->telefone?></td>
                <td><?=$empresa->nif?></td>
                <td><?=$empresa->morada?></td>
                <td><?=$empresa->codigopostal?></td>
                <td><?=$empresa->localidade?></td>
                <td><?=$empresa->capitalsocial?></td>
                <td>
                    <a href="index.php?r=load&p=updateEmpresa" class="btn btn-info"
                        role="button">Editar</a>
                </td>
            </tr>
        </tbody>
    </table>
    <br>
    <br>

    <a href="index.php">Voltar ao menu</a>