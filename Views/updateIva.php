<link rel="stylesheet" type="text/css" href="public/css/afc.css">	
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

<div class="container" align="center">
<label class="ok3"><h2>UPDATE IVA</h2></label>

   <form action="index.php?r=iva/edit&i=<?=$_GET["i"] ?>" method="post" class="needs-validation row justify-content-center" novalidate>
        <div class="col col-6">
            <div class="mb-3">
                <label for="inputPercentagem" class="form-label ok2">Nova Percentagem:</label>
                <input type="number" class="form-control" id="inputPercentagem" name="percentagem" min="0" value="<?=$iva->percentagem?>" required>%
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputDescricao" class="form-label ok2">Nova Descrição:</label>
                <input type="text" class="form-control" id="inputDescricao" name="desc" value="<?=$iva->descricao?>" required>
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
