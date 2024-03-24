<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Modalidade extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'modalidade_fixa', 'ativo', 'responsavel_pagamento'];
}
