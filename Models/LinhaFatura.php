<?php
Class LinhaFatura extends ActiveRecord\Model
{
    static $table_name = 'linhafatura';

    public static function createLinha($fatura, $produto, $iva, $cliente, $quantidade, $total)
    {
        $linha = new LinhaFatura();
        $linha->Fatura_id = $fatura;
        $linha->Produto_id = $produto;
        $linha->Produto_Iva_id = $iva;
        $linha->Fatura_Utilizador_id = $cliente;
        $linha->quantidade = $quantidade;
        $linha->valor = $total;
        $linha->save();
    } 
}