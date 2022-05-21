<?php
Class Empresa extends ActiveRecord\Model
{
    static $table_name = 'empresa';

    public function verificarDados($dados){
        if(isset($dados)){
            extract($dados);
            if(empty($designacaosocial) || empty($capitalsocial) || empty($email) || empty($telefone) || empty($morada) || empty($localidade) || empty($codigopostal)){
                return false;
            }

        }
        return true;
    }
}