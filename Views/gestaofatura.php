<h2>Lista de Faturas</h2>

<table class="table tablestriped">
        <thead>
            <th>
                Id
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
        </thead>
        <tbody>
            <?php foreach ($faturas as $fatura) {?>
            <tr>
                <td><?=$fatura->id?></td>
                <td><?=$fatura->utilizador_id?></td>
                <td><?=$fatura->datafatura?></td>
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
    <br>

    <br>
    <a href="index.php">Voltar ao menu</a>