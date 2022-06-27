
<div class="container" align="center">
<label class="ok3"><h2>UPDATE Funcionário</h2></label>
<label class="ok3"><?php if(isset($error)){echo $error;}?></label>
    <form action="index.php?r=user/edit&i=<?=$OriginUser->id?>" method="post" class="needs-validation row justify-content-center" novalidate>
        <input type="hidden" name="id" value="<?= $OriginUser->id?>">
        
        <div class="col col-6">
            <div class="mb-3">
                <label for="inputUsername" class="form-label ok2">Username:</label>
                <input type="text" class="form-control" id="inputUsername" name="user" value="<?php if(isset($user)){echo $user["username"];}else{echo $OriginUser->username;}?>" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label ok2">Password:</label>
                <input type="password" class="form-control" id="inputPassword" name="pass" value="" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label ok2">Email:</label>
                <input type="email" class="form-control" id="inputPassword" name="email" value="<?php if(isset($user)){echo $user["email"];}else{echo $OriginUser->email;}?>" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label ok2">Telefone:</label>
                <input type="number" class="form-control" id="inputPassword" name="tele" value="<?php if(isset($user)){echo $user["telefone"];}else{echo $OriginUser->telefone;}?>" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label ok2">NIF:</label>
                <input type="number" class="form-control" id="inputPassword" name="nif" value="<?php if(isset($user)){echo $user["nif"];}else{echo $OriginUser->nif;}?>" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label ok2">Morada:</label>
                <input type="text" class="form-control" id="inputPassword" name="morada" value="<?php if(isset($user)){echo $user["morada"];}else{echo $OriginUser->morada;}?>" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label ok2">Localidade:</label>
                <input type="text" class="form-control" id="inputPassword" name="local" value="<?php if(isset($user)){echo $user["localidade"];}else{echo $OriginUser->localidade;}?>" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label ok2">Codigo Postal:</label>
                <input type="text" class="form-control" id="inputCodigoPostal" name="cod" pattern="^\d{4}-\d{3}?$" value="<?php if(isset($user)){echo $user["codigopostal"];}else{echo $OriginUser->codigopostal;}?>" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <button type="submit" class="btn btn-primary" role="button" id="coids">Editar</button>
            <a href="index.php"class="btn btn-primary" role="button" id="coids">Voltar ao menu</a>
        </div>
    </form>
</div>