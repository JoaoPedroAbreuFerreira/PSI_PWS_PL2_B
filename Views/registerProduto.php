<link rel="stylesheet" type="text/css" href="public/css/afc.css">	
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

<div class="container" align="center">
<label class="ok3"><h2>REGISTAR PRODUTO</h2></label>
<form action="index.php?r=produto/create" method="post" class="needs-validation row justify-content-center" novalidate>
        <div class="col col-6">
            <div class="mb-3">
                <label for="inputReferencia" class="form-label ok2">Referencia:</label>
                <input type="text" class="form-control" id="inputReferencia" name="referencia" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputDescricao" class="form-label ok2">Descrição:</label>
                <input type="text" class="form-control" id="inputDescricao" name="desc" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputPreco" class="form-label ok2">Preço:</label>
                <input type="number" class="form-control" id="inputPreco" name="preco" min="0" required>€
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="mb-3">
                <label for="inputStock" class="form-label ok2">Stock:</label>
                <input type="number" class="form-control" id="inputStock" name="stock" min="0" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
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
            <?php foreach ($ivas as $iva) { ?>
            <tr>
                <td><?=$iva->id?></td>
                <td><?=$iva->percentagem?></td>
                <td><?=$iva->descricao?></td>
                <td><?=$iva->vigor?></td>
                <td><input type="radio" id="iva" name="iva" value="<?= $iva->id ?>"></td>
                
            </tr>
            <?php } ?>
        </tbody>
    </table>
            <button type="submit" class="btn btn-primary" role="button" id="coids">Registar</button>
            <a href="index.php" class="btn btn-primary" role="button" id="coids">Voltar ao menu</a>
        </div>
    </form>