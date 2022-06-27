<hr>
<div>
    <div>
        <h5>Cliente</h5>
        <br>
        <p>Nome: <?=$cliente->username?></p>
        <p>NIF: <?=$cliente->nif?></p>
        <p>Telefone: <?=$cliente->telefone?></p>
        <p><?=$cliente->localidade?>, <?=$cliente->morada?> <?=$cliente->codigopostal?></p>
        <p>Email: <?=$cliente->email?></p>
    </div>
</div>
<div>
    <table class="table">
        <thead>
            <th>Referencia</th>
            <th>Descrição</th>
            <th>Quantidade</th>
            <th>Valor Uni.</th> 
            <th>IVA %</th>
            <th>IVA</th>
            <th>Subtotal</th>
        </thead>
        <tbody>
            <?php foreach ($linhas as $linha) { ?>
                <tr>
                    <td><?=Produto::find_by_id($linha->produto_id)->referencia?></td>
                    <td><?=Produto::find_by_id($linha->produto_id)->descricao?></td>
                    <td><?=$linha->quantidade?></td>
                    <td><?=Produto::find_by_id($linha->produto_id)->preco?>€</td>
                    <td><?=Iva::find_by_id(Produto::find_by_id($linha->produto_id)->iva_id)->percentagem?>%</td>
                    <td><?=$linha->valoriva?>€</td>
                    <td><?=$linha->valor?>€</td>
                </tr>
            <?php } ?>
        </tbody>
    <tfooter>
        <td><b>Total</b></td>
        <td><?=$fatura->valortotal?>€</td>
    </tfooter>
</table>
</div>
<hr>
