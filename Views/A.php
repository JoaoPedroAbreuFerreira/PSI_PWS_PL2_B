<link rel="stylesheet" type="text/css" href="public/css/A.css">	
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


<label class="ok">BEM VINDO <?= $_SESSION["username"]?></label><label class="ok3">[Administrador]</label>
<br>
<div align="center">
<a href="index.php?r=load&p=registerF" class="btn btn-dark" id="coids">Registar funcionário</a>
<br>
<a href="index.php?r=load&p=gestaoFuncionario" class="btn btn-light"id="coids">Gestão de funcionário</a>
<br>
<a href="index.php?r=load&p=gestaoproduto" class="btn btn-info"id="coids">Gerir Produtos</a>
<br>
<a href="index.php?r=load&p=gestaoiva" class="btn btn-warning"id="coids">Gerir Taxas de Iva</a>
<br>
<a href="index.php?r=load&p=registerC" class="btn btn-danger"id="coids">Registar um Cliente</a>
<br>
<a href="index.php?r=load&p=updateCliente" class="btn btn-success"id="coids">Alterar Email / Password</a>
<br>
<a href="index.php?r=load&p=gestaoEmpresa" class="btn btn-secundary"id="coids">Gerir Empresa</a>
<br>
<a href='index.php?r=auth/logout' class="btn btn-primary" role="button"id="coids">Log Out</a>   
</div>