<?php
Class Utilizador extends ActiveRecord\Model
{
    static $table_name = 'utilizador';

    
    public static function searchUsername($user)
    {          
        if(Utilizador::find_by_username($user)) 
        { 
            return false;
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
            if(empty($username) || empty($pass) || empty($nif) || empty($email) || empty($morada) || empty($telefone) || empty($localidade) || empty($codigopostal))
            {
                return false;
            }
            if(trim($username) == "" || trim($pass) == "" || trim($nif) == "" || trim($email) == "" || trim($morada) == "" || trim($telefone) == "" || trim($localidade) == "" || trim($codigopostal) == "")
            {
                return false;
            }
            if(strlen((string)$nif) < 9 || strlen((string)$nif) > 9)
            {
                return false;
            }
            if(strlen((string)$telefone) < 9 || strlen((string)$telefone) > 9)
            {
                return false;
            }
            if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                return false;
            }   
            if(!preg_match("/^([0-9]{4})-([0-9]{3})$/", $codigopostal))
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