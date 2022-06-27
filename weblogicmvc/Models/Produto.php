<?php
Class Produto extends ActiveRecord\Model
{
    static $table_name = 'produto';

    public function verificarDados($dados)
    {
        if(isset($dados))
        {
            extract($dados);
            $ivaValid = Produto::IvaExistValid($iva_id);
            if(empty($preco) || empty($stock) || empty($referencia) || empty($iva_id) || empty($descricao))
            {
                return "Preencha todos os campos";
            }
            if($preco <= 0 || $preco > 99999999 || !is_numeric($preco))
            {
                return "Preço inválido";
            }
            if($stock < 0 || $stock > 99999999 || !is_numeric($preco))
            {
                return "Stock inválido";
            }
            if($ivaValid){
                return "Iva inválido";
            }

        }
        return true; 
    }

    public function verificarIvas()
    {
        $ivas = Iva::all(array('conditions' => 'vigor = 1'));

        
        if(empty($ivas))
        {
            return false;
        }
        return true;
    }

    public static function getProduto($id)
    {
        $produto = Produto::find_by_id($id);

        if($produto == null)
        {
            return false;
        }
        return $produto;
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

    public function revertStock($produto, $quantidade)
    {
        $produto->update_attributes(array("stock" => $produto->stock + $quantidade));
    }

    public function IvaExistValid($id){
        $ivas = Iva::all(array('conditions' => 'vigor = 1'));

        foreach($ivas as $iva){
            if($iva->id == $id){
                return false;
            }
        }

        return true;
    }
}