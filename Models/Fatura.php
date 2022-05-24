<?php
Class Fatura extends ActiveRecord\Model
{
    static $table_name = 'fatura';

    public function verificarDados($dados)
    {
        if(isset($dados))
        {
            extract($dados);
            if(empty($utilizador_id) || empty($cliente_id) ||empty($valorTotal) || empty($ivaTotal))
            {
                return false;
            }
        }
        return true;
    }

    public static function changeEstado($id)
    {
        $fatura = Fatura::find_by_id($id);

        if($fatura)
        {
            $fatura->update_attributes(array("estado" => "Emitida"));
        }
    }
}