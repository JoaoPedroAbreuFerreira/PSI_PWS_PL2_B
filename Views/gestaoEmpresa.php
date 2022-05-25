
<div class="container" align="center">
<label class="ok3"><h2>Empresa</h2></label>

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
            <th>
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
                    <a href="index.php?r=empresa/update" class="btn btn-info"
                        role="button">Editar</a>
                </td>
            </tr>
        </tbody>
    </table>
    <a href="index.php"class="btn btn-primary" role="button" id="coids">Voltar ao menu</a>
</div>