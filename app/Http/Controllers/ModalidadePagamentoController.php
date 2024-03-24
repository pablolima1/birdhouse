<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ModalidadePagamentoRepository;

class ModalidadePagamentoController extends Controller
{
    private $repositoryModalidadePagamento;

    public function __construct(ModalidadePagamentoRepository $repositoryModalidadePagamento)
    {
        $this->repositoryModalidadePagamento = $repositoryModalidadePagamento;
    }

    public function index()
    {
        $modalidadePagamentos = $this->repositoryModalidadePagamento->all();

        return view('modalidade_pagamento.index', compact('modalidadePagamentos'));
    }

    public function create()
    {
        return view ('modalidade_pagamento.create');
    }

    public function store(Request $request)
    {
        try {
            $this->repositoryModalidadePagamento->store($request);
            return redirect()->route('modalidade-pagamento.index');
        } catch (\Throwable $th) {
            return back()->withInput()->with('error', 'Ocorreu um erro ao tentar registrar a modalidade de pagamento.');
        }
    }
}
