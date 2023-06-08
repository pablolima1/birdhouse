@extends('adminlte::page')

@section('title', 'Contas')

@section('content_header')
	<div class="container">
		<div class="row">
			<div class="col">
				<h1>Contas</h1>
			</div>
			<div class="col">
				<div class="float-end">
					<label class="float-end"><h5><b>Total pago: R$</b>{{$totalPagamento}}</h5></label>	
				</div>
			</div>
			
		</div>
	</div>
@stop

@section('content')

<div class="container">

	<div class="row">

		@foreach($agrupado as $mes => $itens)
		<div class="card">
				<div class="card-header">
					<h3 class="card-title"><b>{{ $mes }}</b></h3>
					<div class="card-tools">
						<h5>R$ <b>{{$itens->sum('valor')}}</b></h5>
					</div>
				</div>

				<div class="card-body p-0">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Nome</th>
								<th>Modalidade</th>
								<th>Forma de Pagamento</th>
								<th>Valor</th>
								<th>Data Pagamento</th>
							</tr>
						</thead>
						<tbody>
							@foreach($itens as $item)
							<tr>
								<td>{{$item->nome}}</td>
								<td>{{$item->modalidade->nome}}</td>
								<td>{{$item->modalidadePagamento->nome}}</td>
								<td>{{$item->valor}}</td>
								<td>{{\Carbon\Carbon::parse($item->data_pagamento)->format('d/m/Y')}}</td>			
							</tr>
							@endforeach							
						</tbody>
					</table>
				</div>

			</div>
			@endforeach

	</div>		

</div>


@stop

@section('css')
    <link rel="stylesheet" href="#">
@stop

@section('js')
    <script>

    </script>
@stop