<?php

namespace App\Repositories;

use App\Models\Contas;
use Carbon\Carbon;
use App\Helpers\Format;

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

	public function store(Object $request)
	{
		return Contas::create([
			'id_modalidade' => $request->id_modalidade,
			'id_modalidade_pagamento' => $request->id_modalidade_pagamento,
			'nome' => $request->nome,
			'valor' => Format::formatarParaBanco($request->valor),
			'data_pagamento' => $request->data_pagamento,
			'responsavel_pagamento' => auth()->user()->name,
			'user_id' => auth()->user()->id,
		]);
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

	public function contasPendentes($modalidadesFixas)
	{
		$mesCorrente = Carbon::now()->month;
        $anoCorrente = Carbon::now()->year;

        $contasPagas = Contas::whereYear('data_pagamento', $anoCorrente)
            ->whereMonth('data_pagamento', $mesCorrente)
            ->get();

        $modalidadesPagas = $contasPagas->pluck('id_modalidade');

        $modalidadesNaoPagas = $modalidadesFixas->pluck('id')->diff($modalidadesPagas);

        $contasNaoPagas = $modalidadesFixas->whereIn('id', $modalidadesNaoPagas);

		return $contasNaoPagas;
	}
}
