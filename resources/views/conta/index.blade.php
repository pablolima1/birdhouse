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

		<div class="col-md-6">

			<div class="card">
				<div class="card-header">
					<h3 class="card-title"><b>Outubro</b> - 2022</h3>
					<div class="card-tools">
						<h5>R$ <b>{{$totalOutubro}}</b></h5>
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
							@foreach($contas as $conta)
							@if(\Carbon\Carbon::parse($conta->data_pagamento)->format('m') == 10)
							<tr>
								<td>{{$conta->nome}}</td>
								<td>{{$conta->modalidade->nome}}</td>
								<td>{{$conta->modalidadePagamento->nome}}</td>
								<td>{{$conta->valor}}</td>
								<td>{{\Carbon\Carbon::parse($conta->data_pagamento)->format('m/d/Y')}}</td>			
							</tr>
							@endif
							@endforeach							
						</tbody>
					</table>
				</div>

			</div>
			
		</div>

		<div class="col-md-6">

			<div class="card">
				<div class="card-header">
					<h3 class="card-title"><b>Novembro -</b> 2022</h3>
					<div class="card-tools">
						<h5>R$ <b>{{$totalNovembro}}</b></h5>
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
							@foreach($contas as $conta)
							@if(\Carbon\Carbon::parse($conta->data_pagamento)->format('m') == 11)
							<tr>
								<td>{{$conta->nome}}</td>
								<td>{{$conta->modalidade->nome}}</td>
								<td>{{$conta->modalidadePagamento->nome}}</td>
								<td>{{$conta->valor}}</td>
								<td>{{\Carbon\Carbon::parse($conta->data_pagamento)->format('m/d/Y')}}</td>			
							</tr>
							@endif
							@endforeach							
						</tbody>
					</table>
				</div>

			</div>
			
		</div>
		
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