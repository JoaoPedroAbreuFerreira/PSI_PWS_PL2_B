
<div class="container" align="center">
<label class="ok3"><h2>UPDATE IVA</h2></label>
<label class="ok3"><?php if(isset($error)){echo $error;}?></label>
   <form action="index.php?r=iva/edit&i=<?php if(isset($_GET["i"])){echo $_GET["i"];}else{ echo $iva->id; } ?>" method="post" class="needs-validation row justify-content-center" novalidate>
        <div class="col col-6">
            <div class="mb-3">
                <label for="inputPercentagem" class="form-label ok2">Nova Percentagem:</label>
                <input type="number" class="form-control" id="inputPercentagem" name="percentagem" value="<?php if(isset($alteracao)){echo $alteracao["percentagem"];}else{echo $iva->percentagem; } ?>" min="0" step="1"required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputDescricao" class="form-label ok2">Nova Descrição:</label>
                <input type="text" class="form-control" id="inputDescricao" name="desc" value="<?php if(isset($alteracao)){echo $alteracao["descricao"];}else{echo $iva->descricao; } ?>" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                
                <input type="radio" id="html" name="vigor" value=1 >
                <label style="color:white"for="1">Em vigor</label><br>
                <input type="radio" id="css" name="vigor" value=0 >
                <label style="color:white"for="0">Não em vigor</label><br>

            </div>
            <button type="submit" class="btn btn-primary" role="button" id="coids">Alterar taxa</button>
            <a href="index.php" class="btn btn-primary" role="button" id="coids">Voltar ao menu</a>
        </div>
    </form>
</div>
