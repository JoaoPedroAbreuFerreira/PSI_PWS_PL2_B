 <form action="index.php?r=update&t=empresa" method="post" class="needs-validation row justify-content-center" novalidate>
    <input type="hidden" name="id" value="<?=$_GET["i"] ?>">
    <br>
    <br>
    <div class="col col-6">
            <div class="mb-3">
                <label for="inputUsername" class="form-label">designacaoSocial:</label>
                <input type="text" class="form-control" id="inputUsername" name="designacaoSocial" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label">email:</label>
                <input type="text" class="form-control" id="inputPassword" name="email" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label">telefone:</label>
                <input type="number" class="form-control" id="inputPassword" name="tele" required>€
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label">nif:</label>
                <input type="number" class="form-control" id="inputPassword" name="nif" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label">morada:</label>
                <input type="number" class="form-control" id="inputPassword" name="morada" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label">codigoPostal:</label>
                <input type="number" class="form-control" id="inputPassword" name="cod" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label">localidade:</label>
                <input type="number" class="form-control" id="inputPassword" name="local" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label">capitalSocial:</label>
                <input type="number" class="form-control" id="inputPassword" name="capitalSocial" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>  

            <button type="submit" class="btn btn-primary">Alterar Empresa</button>
        </div>
    </form>

    <br>
    <br>
    <a href="index.php">Voltar ao menu</a>