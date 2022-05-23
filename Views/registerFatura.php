<?php
    require_once("./models/Iva.php");
    $iva = new Iva();
?>

<h2>Lista de Produtos Registados</h2>

<form action="index.php?r=register&t=fatura" method="post" class="needs-validation row justify-content-center">
    <table class="table tablestriped">
        <thead>
            <th>Id</th> <th>Username</th> <th>Email</th> <th>Morada</th> <th>Telefone</th> <th>NIF</th> <th>CodPostal</th> <th>Localidade</th>  
        </thead>
        <tbody>
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

    <table class="table tablestriped">
        <thead>
            <th>Id</th> <th>Id Iva</th> <th>Referencia</th> <th>Descricao</th> <th>Preço</th> <th>Stock</th> 
        </thead>
        <tbody>
            <?php foreach ($produtos as $produto) { ?>
            <tr id="<?=$produto->id?>">
                <td><?=$produto->id?></td>
                <input type="hidden" name="produto[]" value="<?=$produto->id?>">
                <td data-iva-value="<?=$iva->getIvaValue($produto->iva_id)?>"><a href="index.php?r=load&p=gestaoiva" class="btn btn-info" role="button"><?=$produto->iva_id?></a></td>
                <td><?=$produto->referencia?></td>
                <td><?=$produto->descricao?></td>
                <td data-preco-uni><?=$produto->preco?></td>
                <td><?=$produto->stock?></td>
                <td>
                    <input type="number" name="quantidade[]" value="0" min="0" max="<?=$produto->stock?>">
                    Subtotal: <span data-subtotal>0.00</span>€
                    IVA: <span data-iva>0.00</span>€
                </td>
            </tr>
            <?php } ?>          
        </tbody>
    </table>      
    Total: <span data-total>0.00</span>€
    <input type="hidden" id="total" name="total" value="0"><br>
    Total IVA: <span data-total-iva>0.00</span>€
    <input type="hidden" id="totalIva" name="totalIva" value="0"><br>  
    <button type="submit" class="btn btn-primary">Registar</button>            
</form>
<br>
<br>
<a href="index.php">Voltar ao menu</a>

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
        var iva = subTotal / ivaValue.dataset.ivaValue;

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
        
        document.getElementById("total").value = total.toFixed(2);
        document.querySelector(`span[data-total]`).innerText = total.toFixed(2);
        
        document.getElementById("totalIva").value = totalIva.toFixed(2);
        document.querySelector(`span[data-total-iva]`).innerText = totalIva.toFixed(2);
    }
</script>
    