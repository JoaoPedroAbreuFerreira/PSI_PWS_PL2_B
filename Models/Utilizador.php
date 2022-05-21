<?php
Class Utilizador extends ActiveRecord\Model
{
    static $table_name = 'utilizador';

    public static function searchUtilizador($user, $pass)
    {          
        if(Utilizador::find_by_username_and_pass($user, $pass)) 
        { 
            return true; 
        }
        else
        {
            return false;
        } 
    }

    public function verificarDados($dados){
        if(isset($dados)){
            extract($dados);
            if(empty($username) || empty($pass) || empty($nif) || empty($email) || empty($morada)){
                return false;
            }

        }
        return true;
    }

}