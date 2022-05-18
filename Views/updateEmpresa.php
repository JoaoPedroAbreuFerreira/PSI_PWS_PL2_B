 <form action="index.php?r=update&t=empresa" method="post" class="needs-validation row justify-content-center" novalidate>
    <div class="col col-6">
            <div class="mb-3">
                <label for="inputDesignacaoSocial" class="form-label">Designação Social:</label>
                <input type="text" class="form-control" id="inputDesignacaoSocial" name="designacaoSocial" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputEmail" class="form-label">Email:</label>
                <input type="email" class="form-control" id="inputEmail" name="email" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputTelefone" class="form-label">Telefone:</label>
                <input type="number" class="form-control" id="inputTelefone" name="tele" min="0" pattern="{9}" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputNif" class="form-label">NIF:</label>
                <input type="number" class="form-control" id="inputNif" name="nif" min="0" pattern="{9}" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputMorada" class="form-label">Morada:</label>
                <input type="text" class="form-control" id="inputMorada" name="morada" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputCodigoPostal" class="form-label">Código Postal:</label>
                <input type="text" class="form-control" id="inputCodigoPostal" name="cod" pattern="^\d{4}-\d{3}?$" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputLocalidade" class="form-label">Localidade:</label>
                <input type="text" class="form-control" id="inputLocalidade" name="local" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputCapitalSocial" class="form-label">Capital Social:</label>
                <input type="number" class="form-control" id="inputCapitalSocial" name="capitalSocial" min="0" required>€
                    Campo obrigatório!
                </div>
            </div>  

            <button type="submit" class="btn btn-primary">Alterar Empresa</button>
        </div>
    </form>

    <br>
    <br>
    <a href="index.php">Voltar ao menu</a>