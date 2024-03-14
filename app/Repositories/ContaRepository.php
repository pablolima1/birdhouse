<?php

namespace App\Repositories;

use App\Models\Contas;
use Carbon\Carbon;

class ContaRepository 
{
	private $model;

	public function __construct(Contas $model)
	{
		$this->model = $model;
	}

	public function all()
	{
		return $this->model->all();
	}
	
	public function contasAgrupadasMesAno()
	{
		$agrupado = collect(self::all())->groupBy(function ($item) {
            $data = Carbon::parse($item['created_at']);
            return $data->format('m-Y');
        });

		$collection = collect($agrupado);

		return $collection->reverse()->all();
	}
}