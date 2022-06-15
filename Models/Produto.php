<?php
Class Produto extends ActiveRecord\Model
{
    static $table_name = 'produto';

    public function verificarDados($dados)
    {
        if(isset($dados))
        {
            extract($dados);
            if(empty($preco) || empty($stock) || empty($referencia) || empty($iva_id))
            {
                return false;
            }
            if($preco < 0 && $stock < 0 && is_numeric($preco) && is_numeric($stock))
            {
                return false;
            }
        }
        return true; 
    }

    public function verificarIvas()
    {
        $iva = Iva::all();
        
        if(empty($iva))
        {
            return false;
        }
        return true;
    }

    public static function getProduto($id)
    {
        $produto = Produto::find_by_id($id);

        if($produto)
        {
            return $produto;
        }
    }

    public function isUsed($id)
    {
        
        $linhas = LinhaFatura::all();

        foreach($linhas as $linha)
        {
            if($linha->produto_id == $id)
            {
                return false;
            }
        }


        return true;

    }

    public function changeStock($produto, $quantidade)
    {
        $produto->update_attributes(array("stock" => $produto->stock - $quantidade));
    }
}