<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Contas extends Model
{
    use HasFactory;

    protected $fillable = ['id_modalidade', 'id_modalidade_pagamento', 'nome', 'valor', 'data_pagamento', 'responsavel_pagamento', 'user_id'];

    public static function contasPendentes(){

        $modalidadesFixas = DB::table('modalidades as md')                 
                 ->where('md.modalidade_fixa', 1)
                 ->get();

        $contasFixasPagas = DB::table('contas as ct')
                 ->join('modalidades as md', 'ct.id_modalidade', '=', 'md.id')
                 ->where('md.modalidade_fixa', 1)
                 ->whereMonth('ct.created_at', date('m'))
                 ->whereYear('ct.created_at', date('Y'))
                 ->get();       
                
        $resultado = $modalidadesFixas->count() - $contasFixasPagas->count();

        return $resultado;
    }

    public static function contasPendentesPagamento(){

        $contasFixasPagas = DB::table('contas as ct')
                 ->rightJoin('modalidades as md', 'ct.id_modalidade', '=', 'md.id')
                 ->where('md.modalidade_fixa', 1)
                 ->get();

        return $contasFixasPagas;
    }

    public function modalidade()
    {
        return $this->belongsTo(Modalidade::class, 'id_modalidade');
    }

    public function modalidadePagamento()
    {
        return $this->belongsTo(ModalidadePagamento::class, 'id_modalidade_pagamento');
    }
}
