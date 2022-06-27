
<div class="container" align="center">
<label class="ok3"><h2>UPDATE PRODUTOS</h2></label>
<label class="ok3"><?php if(isset($error)){echo $error;}?></label>
    <form action="index.php?r=produto/edit&i=<?php if(isset($_GET["i"])){echo $_GET["i"];}else{ echo $produto->id; } ?>" method="post" class="needs-validation row justify-content-center" novalidate>
    <div class="col col-6">
            <div class="mb-3">
                <label for="inputReferencia" class="form-label ok2">Referencia:</label>
                <input type="text" class="form-control" id="inputReferencia" name="referencia" value="<?php if(isset($alteracao)){echo $alteracao["referencia"];}else{echo $produto->referencia; } ?>" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputDescricao" class="form-label ok2">Descrição:</label>
                <input type="text" class="form-control" id="inputDescricao" name="desc" value="<?php if(isset($alteracao)){echo $alteracao["descricao"];}else{echo $produto->descricao; } ?>" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputPreco" class="form-label ok2">Preço: €</label>
                <input type="number" class="form-control" id="inputPreco" name="preco" min="0" value="<?php if(isset($alteracao)){echo $alteracao["preco"];}else{echo $produto->preco; } ?>" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputStock" class="form-label ok2">Stock:</label>
                <input type="number" class="form-control" id="inputStock" name="stock" min="0" value="<?php if(isset($alteracao)){echo $alteracao["stock"];}else{echo $produto->stock; } ?>" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <table class="table tablestriped">
        <thead>
            <th>
                id
            </th>
            <th>
                Percentagem
            </th>
            <th>
                Descrição
            </th>
            <th>
                Vigor
            </th>
            <th>
                
            </th>

        </thead>
        <tbody>
            <?php foreach ($ivas as $iva) {if($iva->vigor == 1){ ?>
            <tr>
                <td><?=$iva->id?></td>
                <td><?=$iva->percentagem?></td>
                <td><?=$iva->descricao?></td>
                <td><?=$iva->vigor?></td>
                <td>
                    <input type="radio" id="html" name="iva" value="<?=$iva->id?> ">
                </td>
            </tr>
            <?php } }?>
        </tbody>
    </table>
            <button type="submit" class="btn btn-primary" role="button" id="coids">Alterar Produto</button>
        </div>
    </form>
    <a href="index.php" class="btn btn-primary" role="button" id="coids">Voltar ao menu</a>
</div>
    