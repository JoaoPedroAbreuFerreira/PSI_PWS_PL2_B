    <h2>Lista de ivas em registados</h2>

    <table class="table tablestriped">
            <thead>
                <th>
                    Id
                </th>
                <th>
                    Taxa
                </th>
                <th>
                    Descrição
                </th> 
                <th>
                    Vigor
                </th> 
            </thead>
            <tbody>
                <?php foreach ($ivas as $iva) { ?>
                <tr>
                    <td><?=$iva->id?></td>
                    <td><?=$iva->percentagem?></td>
                    <td><?=$iva->descricao?></td>
                    <td><?=$iva->vigor?></td>
                    <td>
                        <a href="index.php?r=load&p=updateiva" class="btn btn-info"
                            role="button">Editar</a>
                        <a href="index.php?r=db/delete&t=iva&i=<?=$iva->id?>" class="btn btn-warning"
                            role="button">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <br>
        <br>

        <a href="index.php?r=load&p=registeriva"> Registar um taxa de Iva</a>
        <br>
        <br>
        <a href="index.php">Voltar ao menu</a>