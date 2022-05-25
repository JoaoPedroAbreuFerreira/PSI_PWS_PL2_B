<?php
Class Utilizador extends ActiveRecord\Model
{
    static $table_name = 'utilizador';

    
    public static function searchUsername($user)
    {          
        if(Utilizador::find_by_username($user)) 
        { 
            return FALSE;
        }
        else
        {
            return true;
        } 
    }
        
    

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

    
    public function verificarDados($dados)
    {
        if(isset($dados))
        {
            extract($dados);
            if(empty($username) || empty($pass) || empty($nif) || empty($email) || empty($morada))
            {
                return false;
            }

        }
        return true;
    }

    public static function getUserRole($user, $pass)
    {
        $user = Utilizador::find_by_username_and_pass($user, $pass);
        if($user) 
        {  
            return $user->role; 
        }
    }

    public static function getUser($id)
    {
        $user = Utilizador::find_by_id($id);
        if($user) 
        {  
            return $user; 
        }
    }

    public function isUsed($id)
    {
        
        $faturas = Fatura::all();

        foreach($faturas as $fatura)
        {
            if($fatura->utilizador_id == $id)
            {
                return false;
            }
        }


        return true;

    }

}