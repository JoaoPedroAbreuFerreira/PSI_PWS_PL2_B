<h2>Lista de produtos registados</h2>

<table class="table tablestriped">
        <thead>
            <th>
                Id
            </th>
            <th>
                Id Iva
            </th>
            <th>
                Referencia
            </th> 
            <th>
                Descricao
            </th> 
            <th>
                Preço
            </th> 
            <th>
                Stock
            </th> 
        </thead>
        <tbody>
            <?php foreach ($produtos as $produto) { ?>
            <tr>
                <td><?=$produto->id?></td>
                <td><a href="index.php?r=load&p=gestaoiva" class="btn btn-info"
                        role="button"><?=$produto->iva_id?></a></td>
                <td><?=$produto->referencia?></td>
                <td><?=$produto->descricao?></td>
                <td><?=$produto->preco?></td>
                <td><?=$produto->stock?></td>
                <td>
                    <a href="index.php?r=load&p=updateproduto" class="btn btn-info"
                        role="button">Editar</a>
                    <a href="index.php?r=db/delete&t=produto&i=<?=$produto->id?>" class="btn btn-warning"
                        role="button">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <br>
    <br>

    <a href="index.php?r=load&p=registerproduto"> Registar um Produto</a>
    <br>
    <br>
    <a href="index.php">Voltar ao menu</a>