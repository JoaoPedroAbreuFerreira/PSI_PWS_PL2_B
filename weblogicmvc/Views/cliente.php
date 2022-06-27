

<label class="ok">BEM VINDO <?= $_SESSION["username"]?></label><label class="ok3">[Cliente]</label>
<div align="center">
<br>
<a href="index.php?r=fatura/index&i=<?= $_SESSION["username"]?>" class="btn btn-dark" id="coids">Lista de Faturas</a>
<br>
<a href='index.php?r=auth/logout' class="btn btn-primary" role="button"id="coids">Log Out</a>   
</div>