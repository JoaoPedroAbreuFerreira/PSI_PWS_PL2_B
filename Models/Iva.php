<?php
Class Iva extends ActiveRecord\Model
{
    static $table_name = 'iva';
    
    public static function getIvaValue($id)
    {
        $iva = Iva::find_by_id($id);
        return $iva->percentagem;
    }
}