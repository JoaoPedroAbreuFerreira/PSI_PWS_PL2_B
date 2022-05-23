<?php
Class LinhaFatura extends ActiveRecord\Model
{
    static $table_name = 'linhafatura';

    public static function createLinha($fatura, $produto, $iva, $cliente, $quantidade, $total)
    {
        $linha = new LinhaFatura();

        $dados = 
        [
            "Fatura_id" => $fatura,
            "Produto_id" => $produto,
            "Produto_Iva_id" => $iva,
            "Fatura_Utilizador_id" => $cliente,
            "quantidade" => $quantidade,
            "valor" => $total
        ];

        $linha::create($dados);
    } 
}