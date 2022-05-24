<link rel="stylesheet" type="text/css" href="public/css/afc.css">	
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

<div class="container" align="center">
<label class="ok3"><h2>UPDATE Funcionario</h2></label>

    <form action="index.php?r=user/edit&i=<?= $user->id?>" method="post" class="needs-validation row justify-content-center" novalidate>
        <input type="hidden" name="id" value="<?= $user->id?>">
        <div class="col col-6">
            <div class="mb-3">
                <label for="inputUsername" class="form-label ok2">Username:</label>
                <input type="text" class="form-control" id="inputUsername" name="user" value="<?= $user->username?>" required>
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
                <input type="email" class="form-control" id="inputPassword" name="email" value="<?= $user->email?>" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label ok2">Telefone:</label>
                <input type="number" class="form-control" id="inputPassword" name="tele" value="<?= $user->telefone?>" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label ok2">NIF:</label>
                <input type="number" class="form-control" id="inputPassword" name="nif" value="<?= $user->nif?>" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label ok2">Morada:</label>
                <input type="text" class="form-control" id="inputPassword" name="morada" value="<?= $user->morada?>" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label ok2">Localidade:</label>
                <input type="text" class="form-control" id="inputPassword" name="local" value="<?= $user->localidade?>" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label ok2">Codigo Postal:</label>
                <input type="text" class="form-control" id="inputPassword" name="cod" value="<?= $user->codigopostal?>" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <button type="submit" class="btn btn-primary" role="button" id="coids">Editar</button>
            <a href="index.php"class="btn btn-primary" role="button" id="coids">Voltar ao menu</a>
        </div>
    </form>
</div>