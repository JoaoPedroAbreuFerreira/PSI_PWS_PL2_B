
<div class="container" align="center">
<label class="ok3"><h2>Registar Fatura</h2></label>
<label class="ok3"><?php if(isset($error)){echo $error;}?></label>
<form action="index.php?r=fatura/create" method="post" class="needs-validation row justify-content-center">
    <?php require_once("./views/layouts/searchbarUsers.php"); ?>
    <table class="table tablestriped">
        <thead>
            <th>Id</th> <th>Username</th> <th>Email</th> <th>Morada</th> <th>Telefone</th> <th>NIF</th> <th>CodPostal</th> <th>Localidade</th> <th></th> 
        </thead>
        <tbody class="listUsers">
            <?php foreach ($clientes as $cliente) { ?>
            <tr>
                <td><?=$cliente->id?></td>
                <td><?=$cliente->username?></td>
                <td><?=$cliente->email?></td>
                <td><?=$cliente->morada?></td>
                <td><?=$cliente->telefone?></td>
                <td><?=$cliente->nif?></td>
                <td><?=$cliente->codigopostal?></td>
                <td><?=$cliente->localidade?></td>              
                <td>
                    <input type="radio" id="html" name="cliente" value="<?=$cliente->id?>" required>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    
    <?php require_once("./views/layouts/searchbarProdutos.php"); ?>
    <table class="table tablestriped">
        <thead>
            <th>Id</th> <th>Id Iva</th> <th>Referencia</th> <th>Descricao</th> <th>Preço</th> <th>Stock</th><th></th><th></th><th></th>
        </thead>
        <tbody class="listProdutos">
            <?php foreach ($produtos as $produto) { ?>
            <tr id="<?=$produto->id?>">
                <td><?=$produto->id?></td>
                <input type="hidden" name="produto[]" value="<?=$produto->id?>">
                <td data-iva-value="<?=Iva::getIvaValue($produto->iva_id)?>"><a href="index.php?r=iva/index" class="btn btn-info" role="button"><?=$produto->iva_id?></a></td>
                <td><?=$produto->referencia?></td>
                <td><?=$produto->descricao?></td>
                <td data-preco-uni><?=$produto->preco?></td>
                <td><?=$produto->stock?></td>
                <td>
                    <input type="number" name="quantidade[]" value="0" min="0" max="<?=$produto->stock?>">
                    <td>Subtotal: <span data-subtotal>0.00</span>€</td>
                    <td>IVA: <span data-iva>0.00</span>€</td>
                </td>
            </tr>
            <?php } ?>          
        </tbody>
    </table> 
    <div>
        <div>
            <div>
                <label style="color:white">Subtotal: <span data-total-sem-iva>0.00</span>€</label>
                <input type="hidden" id="totalSemIva" name="totalSemIva" value="0"><br>
            </div>
            <div>
                <label style="color:white">Total IVA: <span data-total-iva>0.00</span>€</label>
                <input type="hidden" id="totalIva" name="totalIva" value="0"><br>
            </div>
            <div>
                <label style="color:white">Total: <span data-total>0.00</span>€</label>
                <input type="hidden" id="total" name="total" value="0"><br>
            </div>
        </div>
        <div> 
            <button  type="submit" class="btn btn-primary" role="button" id="coids">Registar</button>
        </div>
    </div>
    </form>
    <div>
        <a href="index.php" class="btn btn-primary" role="button" id="coids">Voltar ao menu</a>    
    </div>      
</div> 
<br>
<br>

<script>
    var inputs = document.querySelectorAll("input[type='number']");
    
    inputs.forEach(input => 
    {
        input.addEventListener("input", calculateTotal);
    });

    function calculateTotal(e)
    {
        if(e.target.value == "") { e.target.value = 0; }

        var subTotalSpan = document.querySelector(`tr[id='${e.composedPath()[2].id}'] span[data-subtotal]`);
        var ivaSpan = document.querySelector(`tr[id='${e.composedPath()[2].id}'] span[data-iva]`);

        var precoUni = document.querySelector(`tr[id='${e.composedPath()[2].id}'] td[data-preco-uni]`);
        var ivaValue = document.querySelector(`tr[id='${e.composedPath()[2].id}'] td[data-iva-value]`);

        var subTotal = e.target.value * precoUni.innerText;
        var iva = subTotal * ivaValue.dataset.ivaValue / 100;

        subTotalSpan.innerText = subTotal.toFixed(2);
        ivaSpan.innerText = iva.toFixed(2);

        var subTotals = document.querySelectorAll(`span[data-subtotal]`);
        var ivas = document.querySelectorAll(`span[data-iva]`);

        var total = 0;
        var totalIva = 0;

        subTotals.forEach(sub =>
        {
            total += parseFloat(sub.innerText);
        });

        ivas.forEach(iva =>
        {
            totalIva += parseFloat(iva.innerText);
        });
        
        document.getElementById("totalSemIva").value = total.toFixed(2);
        document.querySelector(`span[data-total-sem-iva]`).innerText = total.toFixed(2);
        
        document.getElementById("totalIva").value = totalIva.toFixed(2);
        document.querySelector(`span[data-total-iva]`).innerText = totalIva.toFixed(2);

        document.getElementById("total").value = (total + totalIva).toFixed(2);
        document.querySelector(`span[data-total]`).innerText = (total + totalIva).toFixed(2);
    }
</script>
    