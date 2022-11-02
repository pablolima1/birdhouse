<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Contas extends Model
{
    use HasFactory;

    protected $fillable = ['id_modalidade', 'id_modalidade_pagamento', 'nome', 'valor', 'data_pagamento', 'responsavel_pagamento'];

    public static function getContas(){

    	$query = DB::table('contas as ct')
    			 ->select('ct.nome as nome_conta', 'ct.valor as valor_conta', 'ct.data_pagamento as dt_pag_conta', 'ct.responsavel_pagamento as resp_pag_conta', 'ct.created_at as data_criacao_conta', 'md.nome as nome_mod', 'mp.nome as nome_mod_pag')
    			 ->leftJoin('modalidades as md', 'ct.id_modalidade', '=', 'md.id')
    			 ->leftJoin('modalidade_pagamentos as mp', 'ct.id_modalidade_pagamento', '=', 'mp.id')
    			 ->get();

    	return $query;
    }

    public static function contasPendentes(){

        $modalidadesFixas = DB::table('modalidades as md')                 
                 ->where('md.modalidade_fixa', 1)
                 ->get();

        $contasFixasPagas = DB::table('contas as ct')
                 ->join('modalidades as md', 'ct.id_modalidade', '=', 'md.id')
                 ->where('md.modalidade_fixa', 1)
                 ->whereMonth('md.created_at', date('m'))
                 ->get();       
                 
        $resultado = $modalidadesFixas->count() - $contasFixasPagas->count();

        return $resultado;
    }
}
