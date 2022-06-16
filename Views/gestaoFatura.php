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
                   <?php if($fatura->estado == "Emitida"){ echo "<a href='index.php?r=fatura/print&i=$fatura->id' class='btn btn-info'
                        role='button'>Imprimir</a>"; } ?>
                   <?php if($fatura->estado == "Em Lancamento"){ echo "<a href='index.php?r=fatura/delete&i=$fatura->id' class='btn btn-info'
                        role='button'>Delete</a>"; } ?>
                   <?php if($fatura->estado == "Em Lancamento"){ echo "<a href='index.php?r=fatura/update&i=$fatura->id' class='btn btn-info'
                        role='button'>Emitir</a>"; } ?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="index.php"class="btn btn-primary" role="button" id="coids">Voltar ao menu</a>
</div>