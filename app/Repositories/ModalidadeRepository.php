<?php

namespace App\Repositories;

use App\Models\Modalidade;
use Carbon\Carbon;

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

	public function fixas()
	{
		return $this->model->all()->where('modalidade_fixa', true);
	}
	
}