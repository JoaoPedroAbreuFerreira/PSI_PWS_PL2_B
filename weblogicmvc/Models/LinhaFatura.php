<?php
Class LinhaFatura extends ActiveRecord\Model
{
    static $table_name = 'linhafatura';

    public function verificarDados($dados)
    {
        if(isset($dados))
        {
            extract($dados);
            $produto = Produto::find_by_id($Produto_id);
            $stock = $produto->stock;

            if($produto == null)
            {
                return "Produto Inválido";
            }  
            if(empty($Fatura_id) && empty($Produto_id) && empty($quantidade) && empty($valor) && empty($valorIva))
            {
                return "Preencha todos os campos";
            }        
            if($stock < $quantidade)
            {
                return "Quantidade Inválida";
            }
            if((int)$quantidade < 0)
            {
                return "Quantidade Inválida";
            }
        }
        return true;
    }
}