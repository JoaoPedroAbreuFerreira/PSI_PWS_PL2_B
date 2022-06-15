

<label class="ok">BEM VINDO <?= $_SESSION["username"]?></label><label class="ok3">[Funcionario]</label>
<br>
<div align="center">
<a href="index.php?r=produto/index" class="btn btn-primary"id="coids">Gerir Produtos</a>
<br>
<a href="index.php?r=iva/index" class="btn btn-primary"id="coids">Gerir Taxas de Iva</a>
<br>
<a href="index.php?r=user/show&i=cliente" class="btn btn-primary"id="coids">Registar um Cliente</a>
<br>
<a href="index.php?r=user/show&i=update" class="btn btn-primary"id="coids">Alterar Email / Password</a>
<br>
<a href="index.php?r=fatura/show" class="btn btn-primary" id="coids">Emitir Fatura</a>
<br>
<a href="index.php?r=empresa/index" class="btn btn-secundary"id="coids">Gerir Empresa</a>
<br>
<a href='index.php?r=auth/logout' class="btn btn-primary" role="button"id="coids">Log Out</a>   
</div>