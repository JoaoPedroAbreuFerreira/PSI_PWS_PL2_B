<form action="index.php?r=produto/create" method="post" class="needs-validation row justify-content-center" novalidate>
        <div class="col col-6">
            <div class="mb-3">
                <label for="inputReferencia" class="form-label">Referencia:</label>
                <input type="text" class="form-control" id="inputReferencia" name="referencia" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputDescricao" class="form-label">Descrição:</label>
                <input type="text" class="form-control" id="inputDescricao" name="desc" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputPreco" class="form-label">Preço:</label>
                <input type="number" class="form-control" id="inputPreco" name="preco" min="0" required>€
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputStock" class="form-label">Stock:</label>
                <input type="number" class="form-control" id="inputStock" name="stock" min="0" required>
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
                    <input type="radio" id="iva" name="iva" value="<?= $iva->id ?>">
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
            <button type="submit" class="btn btn-primary">Registar</button>
        </div>
    </form>

    <br>
    <br>
    <a href="index.php">Voltar ao menu</a>