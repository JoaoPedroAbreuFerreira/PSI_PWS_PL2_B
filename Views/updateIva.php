
    <form action="index.php?r=update&t=iva" method="post" class="needs-validation row justify-content-center" novalidate>
    <input type="hidden" name="id" value="<?=$_GET["i"] ?>">
    <br>
    <br>
        <div class="col col-6">
            <div class="mb-3">
                <label for="inputPercentagem" class="form-label">Nova Percentagem:</label>
                <input type="number" class="form-control" id="inputPercentagem" name="percentagem" min="0" required>%
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputDescricao" class="form-label">Nova Descrição:</label>
                <input type="text" class="form-control" id="inputDescricao" name="desc" required>
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
    