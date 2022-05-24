<link rel="stylesheet" type="text/css" href="public/css/afc.css">	
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

<div class="container" align="center">
    <label class="ok3"><h2>Registar <?= $type ?></h2></label>
    <form action="index.php?r=user/create&i=<?= $type?>" method="post" class="needs-validation row justify-content-center" novalidate>
        <input type="hidden">
        <div class="col col-6">
            <div class="mb-3">
                <label for="inputUsername" class="form-label ok2">Username</label>
                <input type="text" class="form-control" id="inputUsername" name="user" required>
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
                <input type="email" class="form-control" id="inputEmail" name="email" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputTelefone" class="form-label ok2">Telefone</label>
                <input type="number" class="form-control" id="inputTelefone" name="tele" min="0" pattern="{9}" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputNif" class="form-label ok2">NIF</label>
                <input type="number" class="form-control" id="inputNif" name="nif" min="0" pattern="{9}" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputMorada" class="form-label ok2">Morada</label>
                <input type="text" class="form-control" id="inputMorada" name="morada" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputLocalidade" class="form-label ok2">Localidade</label>
                <input type="text" class="form-control" id="inputLocalidade" name="local" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputCodigoPostal" class="form-label ok2">Código Postal</label>
                <input type="text" class="form-control" id="inputCodigoPostal" name="cod" pattern="^\d{4}-\d{3}?$" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <button type="submit" class="btn btn-primary" role="button" id="coids">Registar</button>
            <a href="index.php" class="btn btn-primary" role="button" id="coids">Voltar ao menu</a> 
        </div>
        
    </form>
</div>