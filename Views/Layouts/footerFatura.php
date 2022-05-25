<footer>
<div>
    <h5>Fatura emitida por:</h5>
    <br>
    <p>Nome: <?=Utilizador::find_by_id($fatura->utilizador_id)->username?></p>
    <p>NIF: <?=Utilizador::find_by_id($fatura->utilizador_id)->nif?></p>
    <p>Telefone: <?=Utilizador::find_by_id($fatura->utilizador_id)->telefone?></p>
    <br>
    <br>
</div>
</footer>
</body>
</html>