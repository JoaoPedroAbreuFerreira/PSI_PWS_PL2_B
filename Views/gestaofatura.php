<link rel="stylesheet" type="text/css" href="public/css/afc.css">	
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

<div class="container" align="center">
<label class="ok3"><h2>Lista Faturas</h2></label>

<table class="table tablestriped">
        <thead>
            <th>
                Id
            </th>
            <th>
                Funcionário
            </th>
            <th>
                Cliente
            </th>
            <th>
                Data
            </th> 
            <th>
                Valor Total
            </th>
            <th>
                Iva Total
            </th>
            <th>
            </th>
        </thead>
        <tbody>
            <?php foreach ($faturas as $fatura) {?>
            <tr>
                <td><?=$fatura->id?></td>
                <td><?=$fatura->utilizador_id?></td>
                <td><?=$fatura->cliente_id?></td>
                <td><?=$fatura->datafatura->format('d/m/Y H:i:s')?></td>
                <td><?=$fatura->valortotal?></td>
                <td><?=$fatura->ivatotal?></td>            
                <td>
                    <a href="index.php?r=fatura/print&i=<?=$fatura->id?>" class="btn btn-info"
                        role="button">Imprimir</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="index.php"class="btn btn-primary" role="button" id="coids">Voltar ao menu</a>
</div>