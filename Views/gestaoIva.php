    <h2>Lista de ivas em vigor</h2>

    <table class="table tablestriped">
            <thead>
                <th>
                    <h3>Id</h3>
                </th>
                <th>
                    <h3>Taxa</h3>
                </th>
                <th>
                    <h3>Descrição</h3>
                </th> 
                <th>
                    <h3>Vigor</h3>
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