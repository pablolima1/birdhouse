<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contas;
use App\Models\User;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $contas = Contas::all();

        $contasPagas = Contas::whereMonth('data_pagamento', date('m'))->whereYear('data_pagamento', date('Y'))->get();
        
        $totalPagamento = Contas::whereMonth('data_pagamento', date('m'))->whereYear('data_pagamento', date('Y'))->sum('valor');
        
        $contasPendentes = Contas::contasPendentes();

        $usuarios = User::all();

        setlocale(LC_TIME, 'ptb');
        $mesAtual = Carbon::now();      
        
        return view('home', compact('contas', 'totalPagamento', 'contasPendentes', 'usuarios', 'mesAtual', 'contasPagas'));
    }
}
