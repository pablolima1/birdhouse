<?php

namespace App\Helpers;

class Format
{
    public static function formatarParaBanco($valor)
    {
        $valor = str_replace('.', '', $valor);
        $valor = str_replace(',', '.', $valor);

        return (float) $valor;
    }

    public static function formatarMoeda($valor)
    {
        return 'R$ ' . number_format($valor, 2, ',', '.');
    }
}
