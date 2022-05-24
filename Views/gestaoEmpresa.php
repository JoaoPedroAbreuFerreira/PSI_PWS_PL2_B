<link rel="stylesheet" type="text/css" href="public/css/afc.css">	
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

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