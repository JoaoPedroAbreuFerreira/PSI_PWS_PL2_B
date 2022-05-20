<?php
Class Fatura extends ActiveRecord\Model
{
    static $table_name = 'fatura';

    public static function createFatura($utilizador, $total, $totalIva)
    {
        $fatura = new Fatura();
        $fatura->utilizadorId = $utilizador;
        $fatura->valorTotal = $total;
        $fatura->ivaTotal = $totalIva;
        $fatura->estado = "EmLancamento";
        $fatura->save();

        return $fatura->id;
    } 
}