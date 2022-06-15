
<div class="container" align="center">
<label class="ok3"><h2>Empresa</h2></label>

<table class="table tablestriped">
        <thead>
            <th>
                Designão Social
            </th>
            <th>
                Email
            </th> 
            <th>
                Telefone
            </th> 
            <th>
                NIF
            </th> 
            <th>
                Morada
            </th> 
            <th>
                Codigo postal
            </th> 
            <th>
                Localidade
            </th> 
            <th>
                Capital Social
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