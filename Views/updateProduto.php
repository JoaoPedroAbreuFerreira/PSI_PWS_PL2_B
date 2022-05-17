<h2>Lista de Produtos Registados</h2>
    <form action="index.php?r=update&t=produto" method="post" class="needs-validation row justify-content-center" novalidate>
    <input type="hidden" name="id" value="<?=$_GET["i"] ?>">
    <br>
    <br>
    <div class="col col-6">
            <div class="mb-3">
                <label for="inputUsername" class="form-label">Referencia:</label>
                <input type="text" class="form-control" id="inputUsername" name="referencia" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label">Descrição:</label>
                <input type="text" class="form-control" id="inputPassword" name="desc" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label">Preço:</label>
                <input type="number" class="form-control" id="inputPassword" name="preco" required>€
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label">Stock:</label>
                <input type="number" class="form-control" id="inputPassword" name="stock" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            Seleciona o Iva a aplicar no produto
            <table class="table tablestriped">
        <thead>
            <th>
                id
            </th>
            <th>
                Percentagem
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
                    <input type="radio" id="html" name="iva" value="<?=$iva->id?> ">
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
            <button type="submit" class="btn btn-primary">Alterar Produto</button>
        </div>
    </form>

    <br>
    <br>
    <a href="index.php">Voltar ao menu</a>
    