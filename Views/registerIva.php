<form action="index.php?r=register&t=iva" method="post" class="needs-validation row justify-content-center" novalidate>
        <div class="col col-6">
            <div class="mb-3">
                <label for="inputUsername" class="form-label">Percentagem:</label>
                <input type="number" class="form-control" id="inputUsername" name="percentagem" required> %
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
                
                <input type="radio" id="html" name="vigor" value=1>
                <label for="1">Em vigor</label><br>
                <input type="radio" id="css" name="vigor" value=0>
                <label for="0">Não em vigor</label><br>

            </div>
            <button type="submit" class="btn btn-primary">Registar</button>
        </div>
    </form>

    <br>
    <br>
    <a href="index.php">Voltar ao menu</a>