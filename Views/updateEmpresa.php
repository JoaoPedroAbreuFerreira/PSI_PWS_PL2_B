<link rel="stylesheet" type="text/css" href="public/css/afc.css">	
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

<div class="container" align="center">
<label class="ok3"><h2>UPDATE EMPRESA</h2></label>
 <form action="index.php?r=empresa/edit" method="post" class="needs-validation row justify-content-center" novalidate>
    <div class="col col-6">
            <div class="mb-3">
                <label for="inputDesignacaoSocial" class="form-label ok2">Designação Social:</label>
                <input type="text" class="form-control" id="inputDesignacaoSocial" name="designacaoSocial" value="<?= $empresa -> designacaosocial?>" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputEmail" class="form-label ok2">Email:</label>
                <input type="email" class="form-control" id="inputEmail" name="email" value="<?= $empresa -> email?>" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputTelefone" class="form-label ok2">Telefone:</label>
                <input type="number" class="form-control" id="inputTelefone" name="tele" min="0" pattern="{9}" value="<?= $empresa -> telefone?>" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputNif" class="form-label ok2">NIF:</label>
                <input type="number" class="form-control" id="inputNif" name="nif" min="0" pattern="{9}" value="<?= $empresa -> nif?>" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputMorada" class="form-label ok2">Morada:</label>
                <input type="text" class="form-control" id="inputMorada" name="morada" value="<?= $empresa -> morada?>" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputCodigoPostal" class="form-label ok2">Código Postal:</label>
                <input type="text" class="form-control" id="inputCodigoPostal" name="cod" pattern="^\d{4}-\d{3}?$" value="<?= $empresa -> codigopostal?>" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputLocalidade" class="form-label ok2">Localidade:</label>
                <input type="text" class="form-control" id="inputLocalidade" name="local" value="<?= $empresa -> localidade?>" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputCapitalSocial" class="form-label ok2">Capital Social:</label>
                <input type="number" class="form-control" id="inputCapitalSocial" name="capitalSocial" min="0" value="<?= $empresa -> capitalsocial?>" required>
                </div>
                <div>
            <button type="submit" class="btn btn-primary" role="button" id="coids">Alterar Empresa</button>
            <a href="index.php"class="btn btn-primary" role="button" id="coids">Voltar ao menu</a>
            </div>
            </div>  
        </div>
    </form>
</div>