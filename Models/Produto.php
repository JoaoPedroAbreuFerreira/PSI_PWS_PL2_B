<?php
Class Produto extends ActiveRecord\Model
{
    static $table_name = 'produto';

    public static function getProduto($id)
    {
        $produto = Produto::find_by_id($id);

        if($produto)
        {
            return $produto;
        }
    }
}