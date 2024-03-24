<?php

namespace App\Http\Controllers;

use App\Helpers\Format;
use Illuminate\Http\Request;
use App\Models\Contas;
use App\Models\Modalidade;
use App\Repositories\ContaRepository;
use App\Repositories\ModalidadeRepository;
use Carbon\Carbon;

class ContasController extends Controller
{
    private $repositoryConta;
    private $repositoryModalidade;

    public function __construct(ContaRepository $repositoryConta, ModalidadeRepository $repositoryModalidade)
    {
        $this->repositoryConta = $repositoryConta;
        $this->repositoryModalidade = $repositoryModalidade;
    }

    public function index()
    {
        $contas = $this->repositoryConta->all();
        $agrupado = $this->repositoryConta->contasAgrupadasMesAno();

        return view('conta.index', compact('contas', 'agrupado'));
    }

    public function create()
    {
        $modalidades = $this->repositoryModalidade->all();

        return view('conta.create', compact('modalidades'));
    }

    public function store(Request $request)
    {
        try {
            $this->repositoryConta->store($request);
            return redirect()->route('conta.index');
        } catch (\Throwable $th) {
            return back()->withInput()->with('error', 'Ocorreu um erro ao tentar registrar o pagamento.');
        }
    }

    public function pendentes()
    {
        $modalidadesFixas = $this->repositoryModalidade->fixas();
        $contasNaoPagas = $this->repositoryConta->contasPendentes($modalidadesFixas);

        return view('conta.contas_pendentes', compact('contasNaoPagas'));
    }
}
