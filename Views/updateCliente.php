</form>
        <div class="mb-3">
            <label for="inputEmail" class="form-label">Novo Email:</label>
            <input type="email" class="form-control" id="inputEmail" name="email" required>
            <div class="invalid-feedback">
                Campo obrigatório!
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Alterar Email</button>
    </div>
</form>

<form action="index.php?r=update&t=user" method="post" class="needs-validation row justify-content-center" novalidate>
    <div class="col col-6">
        <div class="mb-3">
            <label for="inputUsername" class="form-label">Nova Password</label>
            <input type="text" class="form-control" id="inputUsername" name="pass" required> 
            <div class="invalid-feedback">
                Campo obrigatório!
            </div>
        </div>
    </div>
        <button type="submit" class="btn btn-primary">Alterar Password</button>

<br>
<br>
<a href="index.php">Voltar ao menu</a>