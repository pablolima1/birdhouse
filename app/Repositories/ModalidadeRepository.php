<?php

namespace App\Repositories;

use App\Models\Modalidade;

class ModalidadeRepository 
{
	private $model;

	public function __construct(Modalidade $model)
	{
		$this->model = $model;
	}

	public function all()
	{
		return $this->model->all();
	}

	public function store(Object $request)
	{
		return Modalidade::create([
            'nome' => $request->nome,
            'modalidade_fixa' => $request->modalidade_fixa,
            'ativo' => $request->ativo,
            'responsavel_pagamento' => auth()->user()->name
        ]);
	}

	public function fixas()
	{
		return $this->model->all()->where('modalidade_fixa', true);
	}
	
}