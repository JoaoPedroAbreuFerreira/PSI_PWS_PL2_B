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

    public static function verifyEmail($email){
        $emailRegex = '/^\\S+@\\S+\\.\\S+$/';

        if(preg_match($emailRegex, $email)){
            return true;
        }
        return false;

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
        $emailRegex = '/^\\S+@\\S+\\.\\S+$/';

        if(isset($dados))
        {
            extract($dados);
            if(empty($username) || empty($pass) || empty($nif) || empty($email) || empty($morada) || empty($telefone) || empty($localidade) || empty($codigopostal))
            {
                return "Preencha todos os campos";
            }
            if(trim($username) == "" || trim($pass) == "" || trim($nif) == "" || trim($email) == "" || trim($morada) == "" || trim($telefone) == "" || trim($localidade) == "" || trim($codigopostal) == "")
            {
                return "Preencha todos os campos";
            }
            if(strlen((string)$nif) < 9 || strlen((string)$nif) > 9 || $nif < 100000000)
            {
                return "Nif inválido";
            }
            if(strlen((string)$telefone) < 9 || strlen((string)$telefone) > 9 || $telefone < 100000000)
            {
                return "Telefone inválido";
            }
            if(!preg_match($emailRegex, $email)) {
                return "Email inválido";
            }   
            if(! preg_match("/^([0-9]{4})-([0-9]{3})$/", $codigopostal))
            {
                return "Codigo de Postal inválido";
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

    public function nifInUse($nif){
        $users = Utilizador::all();

        foreach($users as $user){
            if($user->nif == $nif){
                return false;
            }
        }
        return true;
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
        
        $faturas = Fatura::all(array('conditions' => "utilizador_id =$id"));

        if(empty($faturas)){
            return true;
        }else{
            return false;
        }

    }

}