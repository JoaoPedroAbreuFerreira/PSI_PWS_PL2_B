<h2>Lista de ivas em vigor</h2>
    <h2>Seleciona o Iva a editar</h2>
    <form action="index.php?r=update&t=iva" method="post" class="needs-validation row justify-content-center" novalidate>
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
                    <input type="radio" id="html" name="id" value="<?=$iva->id?> ">
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <br>
    <br>
        <div class="col col-6">
            <div class="mb-3">
                <label for="inputUsername" class="form-label">Nova Percentagem</label>
                <input type="number" class="form-control" id="inputUsername" name="percentagem" required> 
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label">Nova Descrição:</label>
                <input type="text" class="form-control" id="inputPassword" name="desc" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                
                <input type="radio" id="html" name="vigor" value=1>
                <label for="1">Em vigor</label><br>
                <input type="radio" id="css" name="vigor" value=0>
                <label for="0">Não em vigor</label><br>

            </div>
            <button type="submit" class="btn btn-primary">Alterar taxa</button>
        </div>
    </form>

    <br>
    <br>
    <a href="index.php">Voltar ao menu</a>
    