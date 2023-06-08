<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modalidade extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'modalidade_fixa', 'ativo', 'responsavel_pagamento'];

}
