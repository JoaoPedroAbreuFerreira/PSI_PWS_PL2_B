<?php
Class Utilizador extends ActiveRecord\Model
{
    public static function searchUtilizador($user, $pass)
    {
        static $table_name = 'utilizador';
        
        if($table_name::find_by_username_and_pass($user, $pass)) 
        { 
            return true; 
        }
        else
        {
            return false;
        } 
    }
}