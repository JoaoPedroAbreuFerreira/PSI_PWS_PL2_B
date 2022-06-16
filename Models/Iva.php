<?php
Class Iva extends ActiveRecord\Model
{
    static $table_name = 'iva';

    public function verificarDados($dados)
    {
        if(isset($dados))
        {
            extract($dados);
            if(empty($percentagem) || empty($descricao))
            {
                return "Preencha todos os campos";
            }
            if(trim($descricao) == "")
            {
                return "Preencha a descrição";
            }
            if($percentagem <= 0 || $percentagem >= 100)
            {
                return "Percentagem Inválida";
            }
            if(!is_numeric($vigor))
            {
                return "Vigor Inválido";
            }
        }
        return true;
    }
    
    public static function getIvaValue($id)
    {
        $iva = Iva::find_by_id($id);
        if($iva == null)
        {
            return false;
        }

        return $iva->percentagem;
    }

    public function isUsed($id)
    {
        $produtos = Produto::all();

        foreach($produtos as $produto)
        {
            if($produto->iva_id == $id)
            {
                return false;
            }
        }
        return true;
    }
}