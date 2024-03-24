<?php

namespace App\Http\Controllers;

use App\Repositories\ContaRepository;
use App\Repositories\UsuarioRepository;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    private $repositoryConta;
    private $repositoryUsuario;

    public function __construct(ContaRepository $repositoryConta, UsuarioRepository $repositoryUsuario)
    {
        $this->middleware('auth');
        $this->repositoryConta = $repositoryConta;
        $this->repositoryUsuario = $repositoryUsuario;
    }

    public function index()
    {
        $contasPagas = $this->repositoryConta->contasPagasMesAnoAtual();
        $totalPagamento = $this->repositoryConta->totalPagamentoMesAnoAtual();
        $contasPendentes = $this->repositoryConta->contasPendentes();
        $usuarios = $this->repositoryUsuario->all();
        $mesAtual = ucfirst(Carbon::now()->locale('pt_BR')->monthName);
        
        return view('home', compact('totalPagamento', 'contasPendentes', 'usuarios', 'mesAtual', 'contasPagas'));
    }
}
