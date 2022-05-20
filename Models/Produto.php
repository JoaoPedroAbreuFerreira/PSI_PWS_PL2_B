<?php
Class Produto extends ActiveRecord\Model
{
    static $table_name = 'produto';

    public function verificarDados($dados){
        if(isset($dados)){
            extract($dados);
            if(isset($preco) && isset($referencia) && isset($stock)){
                return true;
            }

        }
        else{
            return false;
        }

    }
}