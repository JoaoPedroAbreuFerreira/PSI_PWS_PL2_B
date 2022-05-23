<?php
Class Produto extends ActiveRecord\Model
{
    static $table_name = 'produto';

    public function verificarDados($dados){
        if(isset($dados)){
            extract($dados);
            if(empty($preco) || empty($stock) || empty($referencia) || empty($iva_id)){
                return false;
            }

        }
        return true;
    }

    public function verificarIvas(){
        $iva = Iva::all();
        if(empty($iva)){
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
}