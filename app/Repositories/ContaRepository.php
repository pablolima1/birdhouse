<?php

namespace App\Repositories;

use App\Models\Contas;
use Carbon\Carbon;
use App\Helpers\Format;
use App\Repositories\ModalidadeRepository;

class ContaRepository
{
	private $model;
	private $repositoryModalidade;

	public function __construct(Contas $model, ModalidadeRepository $repositoryModalidade)
	{
		$this->model = $model;
		$this->repositoryModalidade = $repositoryModalidade;
	}

	public function all()
	{
		return $this->model->all();
	}

	public function store(Object $request)
	{
		return Contas::create([
			'modalidade_id' => $request->modalidade_id,
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

	public function contasPendentes()
	{
		$mesCorrente = Carbon::now()->month;
        $anoCorrente = Carbon::now()->year;

        $contasPagas = Contas::where('user_id', auth()->user()->id)
			->whereYear('data_pagamento', $anoCorrente)
            ->whereMonth('data_pagamento', $mesCorrente)
            ->get();

        $modalidadesPagas = $contasPagas->pluck('modalidade_id');

		$modalidadesFixas = $this->repositoryModalidade->fixas();

        $modalidadesNaoPagas = $modalidadesFixas->pluck('id')->diff($modalidadesPagas);

        $contasNaoPagas = $modalidadesFixas->whereIn('id', $modalidadesNaoPagas);

		return $contasNaoPagas;
	}

	public function contasPagasMesAnoAtual()
	{
		return $this->model->where('user_id', auth()->user()->id)->whereMonth('data_pagamento', date('m'))->whereYear('data_pagamento', date('Y'))->get();
	}

	public function totalPagamentoMesAnoAtual()
	{
		return $this->model->where('user_id', auth()->user()->id)->whereMonth('data_pagamento', date('m'))->whereYear('data_pagamento', date('Y'))->sum('valor');
	}
}
