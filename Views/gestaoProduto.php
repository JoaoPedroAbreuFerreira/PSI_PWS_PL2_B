<link rel="stylesheet" type="text/css" href="public/css/afc.css">	
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

<div class="container" align="center">
<label class="ok3"><h2>Lista de Produtos registados</h2></label>

<table class="table tablestriped">
        <thead>
            <th>
                Id
            </th>
            <th>
                Id Iva
            </th>
            <th>
                Referencia
            </th> 
            <th>
                Descricao
            </th> 
            <th>
                Preço
            </th> 
            <th>
                Stock
            </th> 
            <th>
            </th>
        </thead>
        <tbody>
            <?php foreach ($produtos as $produto) { ?>
            <tr>
                <td><?=$produto->id?></td>
                <td><a href="index.php?r=iva/index" class="btn btn-info"
                        role="button"><?=$produto->iva_id?></a></td>
                <td><?=$produto->referencia?></td>
                <td><?=$produto->descricao?></td>
                <td><?=$produto->preco?></td>
                <td><?=$produto->stock?></td>
                <td>
                    <a href="index.php?r=produto/update&i=<?=$produto->id?>" class="btn btn-info" 
                        role="button">Editar</a>
                    <a href="index.php?r=produto/delete&i=<?=$produto->id?>" class="btn btn-info" 
                        role="button">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <br>
    <br>
    <a href="index.php?r=produto/show" class="btn btn-primary" id="coids" role="button"> Registar um Produto</a>
    <br>
    <a href="index.php" class="btn btn-primary" id="coids" role="button">Voltar ao menu</a>