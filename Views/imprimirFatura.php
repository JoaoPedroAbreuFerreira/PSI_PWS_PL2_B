<div align="center">
    <div>
        <h1><?=$empresa->designacaosocial?></h1>
    </div>
    <div>
        <h2>Fatura</h2>
        <p>Fatura Nº: #<?=$fatura->id?></p>
        <p>Data: <?=$fatura->datafatura->format('d/m/Y H:i:s')?></p>
    </div>
</div>
<hr>
<div align="center">
    <div>
        <h4>Cliente</h4>
        <p>Nome Cliente: <?=$cliente->username?> #<?=$cliente->id?></p>
    </div>
    <br>
    <div>
        <h4>NIF</h4>
        <p><?=$cliente->nif?></p>
    </div>
    <br>
    <div>
        <h4>Morada</h4>
        <p>Morada: <?=$cliente->morada?></p>
        <p>Codigo Postal: <?=$cliente->codigopostal?></p>
        <p>Localidade: <?=$cliente->localidade?></p>
    </div>
    <br>
    <div>
        <h4>Telefone</h4>
        <p><?=$cliente->telefone?></p>
    </div>
    <br>
    <div>
        <h4>Email</h4>
        <p><?=$cliente->email?></p>
    </div>
</div>
<hr>
<div align="center">
    <h4>Produtos</h4>
    <table class="table tablestriped">
    <thead>
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
                <td><?=Produto::find_by_id($linha->produto_id)->descricao?></td>
                <td><?=$linha->quantidade?></td>
                <td><?=Produto::find_by_id($linha->produto_id)->preco?>€</td>
                <td><?=Iva::find_by_id(Produto::find_by_id($linha->produto_id)->iva_id)->percentagem?>%</td>
                <td><?=$linha->valoriva?>€</td>
                <td><?=$linha->valor?>€</td>
            </tr>
        <?php } ?>
    </tbody>
    <tfoot>
        <td>Total</td>
        <td><?=$fatura->valortotal?>€</td>
    </tfoot>
</table>
</div>
<hr>
<div align="center">
    <h5>Fatura emitida por</h5>
    <p>Nome: <?=Utilizador::find_by_id($fatura->utilizador_id)->username?></p>
    <p>NIF: <?=Utilizador::find_by_id($fatura->utilizador_id)->nif?></p>
    <p>Tel. <?=Utilizador::find_by_id($fatura->utilizador_id)->telefone?></p>
</div>