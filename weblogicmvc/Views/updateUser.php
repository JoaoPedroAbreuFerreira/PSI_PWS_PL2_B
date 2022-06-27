
<div class="container" align="center">
<label class="ok3"><h2>UPDATE PASSWORD E EMAIL</h2></label>
<label class="ok3"><?php if(isset($error)){echo $error;}?></label>
<form action="index.php?r=user/change" method="post" class="needs-validation row justify-content-center" novalidate>
    <div class="col col-6">
        <div class="mb-3">
            <label for="inputEmail" class="form-label ok2">Novo Email:</label>
            <input type="email" class="form-control" id="inputEmail" name="email" required>
            <div class="invalid-feedback">
                Campo obrigatório!
            </div>
        </div>
        <button type="submit" class="btn btn-primary" role="button" id="coids">Alterar Email</button>
</div>
</form>
<br>
<form action="index.php?r=user/change" method="post" class="needs-validation row justify-content-center" novalidate>
    <div class="col col-6">
        <div class="mb-3">
            <label for="inputPassword" class="form-label ok2">Nova Password</label>
            <input type="text" class="form-control" id="inputPassword" name="pass" required> 
            <div class="invalid-feedback">
                Campo obrigatório!
            </div>
        </div>
        <button type="submit" class="btn btn-primary" role="button" id="coids">Alterar Password</button>
        <a href="index.php" class="btn btn-primary" role="button" id="coids">Voltar ao menu</a>
    </div>
</form> 
</div>