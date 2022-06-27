<?php
Class Empresa extends ActiveRecord\Model
{
    static $table_name = 'empresa';

    public function verificarDados($dados)
    {
        if(isset($dados))
        {
            $emailRegex = '/^\\S+@\\S+\\.\\S+$/';
            extract($dados);
            
            if(empty($designacaosocial) || empty($capitalsocial) || empty($email) || empty($telefone) || empty($morada) || empty($localidade) || empty($codigopostal))
            {
                return "Preencha todos os campos";
            }
            if(trim($designacaosocial) == "" || trim($capitalsocial) == "" || trim($email) == ""   || trim($telefone) == "" || trim($morada) == "" || trim($localidade) == "" || trim ($codigopostal) == "")
            {
                return "Preencha todos os campos";
            }
            if($capitalsocial > 99999999 || !is_numeric($capitalsocial))
            {
                return "Capital Social inválido";
            }
            if(!preg_match($emailRegex, $email))
            {
                return "Email inválido";
            }
            if(strlen((string)$telefone) < 9 || strlen((string)$telefone) > 9 || $telefone < 100000000)
            {
                return "Telefone inválido";
            }
            if(! preg_match("/^([0-9]{4})-([0-9]{3})$/", $codigopostal))
            {
                return "Codigo de Postal inválido";
            }

        }
        return true;
    }
}