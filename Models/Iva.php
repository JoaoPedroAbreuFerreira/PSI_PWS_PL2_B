<?php
Class Iva extends ActiveRecord\Model
{
    static $table_name = 'iva';

    public function verificarDados($dados)
    {
        if(isset($dados))
        {
            extract($dados);
            if(isset($percentagem) || isset($vigor))
            {
                return true;
            }
        }
        else{
            return false;
        }
    }
    
    public static function getIvaValue($id)
    {
        $iva = Iva::find_by_id($id);
        return $iva->percentagem;
    }

    public function isUsed($id)
    {
        
        $produtos = Produto::all();

        foreach($produtos as $produto)
        {
            if($produto->iva_id == $id)
            {
                return true;
            }
        }


        return false;

    }
}