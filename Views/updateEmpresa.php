
<div class="container" align="center">
<label class="ok3"><h2>UPDATE EMPRESA</h2></label>
<label class="ok3"><?php if(isset($error)){echo $error;}?></label>
 <form action="index.php?r=empresa/edit" method="post" class="needs-validation row justify-content-center" novalidate>
    <div class="col col-6">
            <div class="mb-3">
                <label for="inputDesignacaoSocial" class="form-label ok2">Designação Social:</label>
                <input type="text" class="form-control" id="inputDesignacaoSocial" name="designacaoSocial" value="<?php if(isset($alteracao)){echo $alteracao["designacaosocial"];}else{echo $empresa->designacaosocial;}?>" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputEmail" class="form-label ok2">Email:</label>
                <input type="email" class="form-control" id="inputEmail" name="email" value="<?php if(isset($alteracao)){echo $alteracao["email"];}else{echo $empresa->email;}?>" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputTelefone" class="form-label ok2">Telefone:</label>
                <input type="number" class="form-control" id="inputTelefone" name="tele" min="0" pattern="{9}" value="<?php if(isset($alteracao)){echo $alteracao["telefone"];}else{echo $empresa->telefone;}?>" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputMorada" class="form-label ok2">Morada:</label>
                <input type="text" class="form-control" id="inputMorada" name="morada" value="<?php if(isset($alteracao)){echo $alteracao["morada"];}else{echo $empresa->morada;}?>" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputCodigoPostal" class="form-label ok2">Código Postal:</label>
                <input type="text" class="form-control" id="inputCodigoPostal" name="cod" pattern="^\d{4}-\d{3}?$" value="<?php if(isset($alteracao)){echo $alteracao["codigopostal"];}else{echo $empresa->codigopostal;}?>" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputLocalidade" class="form-label ok2">Localidade:</label>
                <input type="text" class="form-control" id="inputLocalidade" name="local" value="<?php if(isset($alteracao)){echo $alteracao["localidade"];}else{echo $empresa->localidade;}?>" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputCapitalSocial" class="form-label ok2">Capital Social:</label>
                <input type="number" class="form-control" id="inputCapitalSocial" name="capitalSocial" min="0" value="<?php if(isset($alteracao)){echo $alteracao["capitalsocial"];}else{echo $empresa->capitalsocial;}?>" required>
                </div>
                <div>
            <button type="submit" class="btn btn-primary" role="button" id="coids">Alterar Empresa</button>
            <a href="index.php"class="btn btn-primary" role="button" id="coids">Voltar ao menu</a>
            </div>
            </div>  
        </div>
    </form>
</div>