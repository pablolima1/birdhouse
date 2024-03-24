<?php

namespace App\Repositories;

use App\Models\ModalidadePagamento;

class ModalidadePagamentoRepository 
{
	private $model;

	public function __construct(ModalidadePagamento $model)
	{
		$this->model = $model;
	}

	public function all()
	{
		return $this->model->all();
	}

	public function store(Object $request)
	{
		return ModalidadePagamento::create([
            'nome' => $request->nome,
            'modalidade_fixa' => $request->modalidade_fixa,
            'ativo' => $request->ativo,
            'responsavel_pagamento' => auth()->user()->name
        ]);
	}
}