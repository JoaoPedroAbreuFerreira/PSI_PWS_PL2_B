<?php
Class Iva extends ActiveRecord\Model
{
    static $table_name = 'iva';

    public function verificarDados($dados){
        if(isset($dados)){
            extract($dados);
            if(isset($percentagem) || isset($vigor)){
                return true;
            }

        }
        else{
            return false;
        }


    }


}