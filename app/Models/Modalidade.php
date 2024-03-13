<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Modalidade extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'modalidade_fixa', 'ativo', 'responsavel_pagamento'];

    public static function modalidadesFixas()
    {
        $modalidadesFixas = DB::table('modalidades as md')
            ->where('md.modalidade_fixa', 1)
            ->get();

        return $modalidadesFixas;
    }
}
