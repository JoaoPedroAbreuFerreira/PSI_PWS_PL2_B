<link rel="stylesheet" type="text/css" href="public/css/A.css">	
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


<label class="ok">BEM VINDO <?= $_SESSION["username"]?></label><label class="ok3">[Cliente]</label>
<div align="center">
<br>
<a href="index.php?r=fatura/index&i=<?= $_SESSION["username"]?>" class="btn btn-dark" id="coids">Lista de Faturas</a>
<br>
<a href='index.php?r=auth/logout' class="btn btn-primary" role="button"id="coids">Log Out</a>   
</div>