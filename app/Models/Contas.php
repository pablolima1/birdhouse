<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Contas extends Model
{
    use HasFactory;

    protected $fillable = ['id_modalidade', 'id_modalidade_pagamento', 'nome', 'valor', 'data_pagamento', 'responsavel_pagamento', 'user_id'];

    public function modalidade()
    {
        return $this->belongsTo(Modalidade::class, 'id_modalidade');
    }

    public function modalidadePagamento()
    {
        return $this->belongsTo(ModalidadePagamento::class, 'id_modalidade_pagamento');
    }
}
