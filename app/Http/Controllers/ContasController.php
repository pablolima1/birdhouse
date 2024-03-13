<?php

namespace App\Http\Controllers;

use App\Helpers\Format;
use Illuminate\Http\Request;
use App\Models\Contas;
use App\Models\Modalidade;
use App\Models\ModalidadePagamento;
use Carbon\Carbon;

class ContasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contas = Contas::all();

        $agrupado = collect($contas)->groupBy(function ($item) {
            // Use a biblioteca Carbon para manipular as datas
            $data = Carbon::parse($item['created_at']);
            return $data->format('m-Y');
        });

        $modalidades = Modalidade::all();
        $modalidadePagamentos = ModalidadePagamento::all();

        $totalPagamento = Contas::all()->sum('valor');

        return view('conta.index', compact('contas', 'modalidades', 'modalidadePagamentos', 'totalPagamento', 'agrupado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modalidades = Modalidade::all();

        return view('conta.create', compact('modalidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $store = Contas::create([
            'id_modalidade' => $request->id_modalidade,
            'id_modalidade_pagamento' => $request->id_modalidade_pagamento,
            'nome' => $request->nome,
            'valor' => Format::formatarParaBanco($request->valor),
            'data_pagamento' => $request->data_pagamento,
            'responsavel_pagamento' => auth()->user()->name,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('conta.index');
    }

    public function pendentes()
    {

        $mesCorrente = Carbon::now()->month;
        $anoCorrente = Carbon::now()->year;

        $modalidadesFixas = Modalidade::where('modalidade_fixa', true)->get();

        $contasPagas = Contas::whereYear('data_pagamento', $anoCorrente)
            ->whereMonth('data_pagamento', $mesCorrente)
            ->get();

        $modalidadesPagas = $contasPagas->pluck('id_modalidade');

        $modalidadesNaoPagas = $modalidadesFixas->pluck('id')->diff($modalidadesPagas);

        $contasNaoPagas = $modalidadesFixas->whereIn('id', $modalidadesNaoPagas);

        return view('conta.contas_pendentes', compact('contasNaoPagas'));
    }
}
