<link rel="stylesheet" type="text/css" href="public/css/afc.css">	
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

<div class="container" align="center">
<label class="ok3"><h2>UPDATE PASSWORD E EMAIL</h2></label>
<form action="index.php?r=user/change" method="post" class="needs-validation row justify-content-center" novalidate>
        <div class="mb-3">
            <label for="inputEmail" class="form-label ok2">Novo Email:</label>
            <input type="email" class="form-control" id="inputEmail" name="email" required>
            <div class="invalid-feedback">
                Campo obrigatório!
            </div>
        </div>
</form>
<div>
 <button type="submit" class="btn btn-primary" role="button" id="coids">Alterar Email</button>
</div>
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