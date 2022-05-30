<?php
Class LinhaFatura extends ActiveRecord\Model
{
    static $table_name = 'linhafatura';

    public function verificarDados($dados)
    {
        if(isset($dados))
        {
            extract($dados);
            if(empty($Fatura_id) || empty($Produto_id) || empty($quantidade) || empty($valor)|| empty($valorIva))
            {
                return false;
            }
            
            //DONT WORK PLZ HELP
            $produto = Produto::find_by_id($Produto_id);
            $stock = $produto->stock;            
            if($stock < $quantidade)
            {
                return false;
            }
            if($quantidade < 0)
            {
                return false;
            }
            //
        }
        return true;
    }
}