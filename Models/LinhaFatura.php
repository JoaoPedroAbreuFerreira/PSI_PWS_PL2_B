<?php
Class LinhaFatura extends ActiveRecord\Model
{
    static $table_name = 'linhafatura';

    public function verificarDados($dados){
        if(isset($dados)){
            extract($dados);
            if(empty($Fatura_id) || empty($Produto_id) || empty($Produto_Iva_id) || empty($quantidade) || empty($Fatura_Utilizador_id) || empty($valor)){
                return false;
            }
            return true;
        }

    }
}