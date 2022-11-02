<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contas;
use App\Models\User;

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

        $totalPagamento = Contas::all()->sum('valor');

        $contasPendentes = Contas::contasPendentes();

        $usuarios = User::all();
        
        return view('home', compact('contas', 'totalPagamento', 'contasPendentes', 'usuarios'));
    }
}
