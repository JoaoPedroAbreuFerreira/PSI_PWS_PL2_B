<link rel="stylesheet" type="text/css" href="public/css/A.css">	
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


<label class="ok">BEM VINDO <?= $_SESSION["username"]?></label><label class="ok3">[Administrador]</label>
<br>
<div align="center">
<a href="index.php?r=user/show&i=funcionario" class="btn btn-dark" id="coids">Registar funcionário</a>
<br>
<a href="index.php?r=user/index" class="btn btn-light"id="coids">Gestão de funcionário</a>
<br>
<a href="index.php?r=produto/index" class="btn btn-info"id="coids">Gerir Produtos</a>
<br>
<a href="index.php?r=iva/index" class="btn btn-warning"id="coids">Gerir Taxas de Iva</a>
<br>
<a href="index.php?r=user/show&i=cliente" class="btn btn-danger"id="coids">Registar um Cliente</a>
<br>
<a href="index.php?r=user/show&i=update" class="btn btn-success"id="coids">Alterar Email / Password</a>
<br>
<a href="index.php?r=fatura/show" class="btn btn-warning" id="coids">Emitir Fatura</a>
<br>
<a href="index.php?r=fatura/index&i=<?= $_SESSION["username"]?>" class="btn btn-warning" id="coids">Histórico de Faturas</a>
<br>
<a href="index.php?r=empresa/index" class="btn btn-secundary"id="coids">Gerir Empresa</a>
<br>
<a href='index.php?r=auth/logout' class="btn btn-primary" role="button"id="coids">Log Out</a>   
</div>