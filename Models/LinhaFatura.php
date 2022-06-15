<?php
Class LinhaFatura extends ActiveRecord\Model
{
    static $table_name = 'linhafatura';

    public function verificarDados($dados)
    {
        if(isset($dados))
        {
            extract($dados);
            if(empty($Fatura_id) && empty($Produto_id) && empty($quantidade) && empty($valor) && empty($valorIva))
            {
                return false;
            }
        }
        return true;
    }
}