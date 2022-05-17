<div class="container">
    <h2>Editar Funcionario</h2>
    <form action="index.php?r=update&t=funcionario" method="post" class="needs-validation row justify-content-center" novalidate>
        <input type="hidden" name="id" value="<?= $_GET["i"]?>">
        <div class="col col-6">
            <div class="mb-3">
                <label for="inputUsername" class="form-label">Username:</label>
                <input type="text" class="form-control" id="inputUsername" name="user" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label">Password:</label>
                <input type="password" class="form-control" id="inputPassword" name="pass" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label">Email:</label>
                <input type="email" class="form-control" id="inputPassword" name="email" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label">Telefone:</label>
                <input type="number" class="form-control" id="inputPassword" name="tele" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label">NIF:</label>
                <input type="number" class="form-control" id="inputPassword" name="nif" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label">Morada:</label>
                <input type="text" class="form-control" id="inputPassword" name="morada" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label">Localidade:</label>
                <input type="text" class="form-control" id="inputPassword" name="local" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label">Codigo Postal:</label>
                <input type="text" class="form-control" id="inputPassword" name="cod" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Editar</button>
        </div>
    </form>
</div>

<br>
    <br>
    <a href="index.php">Voltar ao menu</a>