<?php
Class Fatura extends ActiveRecord\Model
{
    static $table_name = 'fatura';

    public static function createFatura($utilizador, $total, $totalIva)
    {
        $fatura = new Fatura();

        $dados =
        [
            "Utilizador_id" => $utilizador,
            "valorTotal" => $total,
            "ivaTotal" => $totalIva,
            "estado" => "Em Lancamento"
        ];

        $fatura = $fatura::create($dados);

        return $fatura->id;
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