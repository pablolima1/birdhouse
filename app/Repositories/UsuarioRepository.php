<?php

namespace App\Repositories;

use App\Models\User;

class UsuarioRepository 
{
	private $model;

	public function __construct(User $model)
	{
		$this->model = $model;
	}

	public function all()
	{
		return $this->model->all();
	}
}