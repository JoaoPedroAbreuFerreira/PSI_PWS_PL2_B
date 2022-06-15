
<div class="container" align="center">
    <label class="ok3"><h2>Registar <?= $type ?></h2></label>
    <form action="index.php?r=user/create&i=<?= $type?>" method="post" class="needs-validation row justify-content-center">
        <input type="hidden">
        <div class="col col-6">
        <label class="ok3"><?php if(isset($error)){echo $error;}?></label>
            <div class="mb-3">
                <label for="inputUsername" class="form-label ok2">Username</label>
                <input type="text" class="form-control" id="inputUsername" name="user" value="<?php if(isset($user)){echo $user["username"];}?>" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label ok2">Password</label>
                <input type="password" class="form-control" id="inputPassword" name="pass" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputEmail" class="form-label ok2">Email</label>
                <input type="email" class="form-control" id="inputEmail" name="email" value="<?php if(isset($user)){echo $user["email"];}?>" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputTelefone" class="form-label ok2">Telefone</label>
                <input type="number" class="form-control" id="inputTelefone" value="<?php if(isset($user)){echo $user["telefone"];}?>" name="tele" min="0" pattern="{9}" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputNif" class="form-label ok2">NIF</label>
                <input type="number" class="form-control" id="inputNif" name="nif" value="<?php if(isset($user)){echo $user["nif"];}?>" min="0" pattern="{9}" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputMorada" class="form-label ok2">Morada</label>
                <input type="text" class="form-control" id="inputMorada" name="morada" value="<?php if(isset($user)){echo $user["morada"];}?>" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputLocalidade" class="form-label ok2">Localidade</label>
                <input type="text" class="form-control" id="inputLocalidade" name="local" value="<?php if(isset($user)){echo $user["localidade"];}?>" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputCodigoPostal" class="form-label ok2">Código Postal</label>
                <input type="text" class="form-control" id="inputCodigoPostal" name="cod" pattern="^\d{4}-\d{3}?$" value="<?php if(isset($user)){echo $user["codigopostal"];}?>" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <button type="submit" class="btn btn-primary" role="button" id="coids">Registar</button>
            <a href="index.php" class="btn btn-primary" role="button" id="coids">Voltar ao menu</a> 
        </div>
    </div>
    </form>
</div>