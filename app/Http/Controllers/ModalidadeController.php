<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ModalidadeRepository;

class ModalidadeController extends Controller
{
    private $repositoryModalidade;

    public function __construct(ModalidadeRepository $repositoryModalidade)
    {
        $this->repositoryModalidade = $repositoryModalidade;
    }

    public function index()
    {
        $modalidades = $this->repositoryModalidade->all();
        return view('modalidade.index', compact('modalidades'));
    }

    public function create()
    {
        return view('modalidade.create');
    }

    public function store(Request $request)
    {
        try {
            $this->repositoryModalidade->store($request);
            return redirect()->route('modalidade.index');
        } catch (\Throwable $th) {
            return back()->withInput()->with('error', 'Ocorreu um erro ao tentar registrar a modalidade.');
        }
    }
}
