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
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Nome</th>
				<th>Modalidade</th>
				<th>Forma Pagamento</th>
				<th>Valor</th>
				<th>Data Pagamento</th>
				<th>Data Cadastro</th>
				<th>Responsável Cadastro</th>				
			</tr>
		</thead>
		<tbody>
			@foreach($contas as $conta)
			<tr>
				<td>{{$conta->nome}}</td>
				<td>{{$conta->modalidade->nome}}</td>
				<td>{{$conta->modalidadePagamento->nome}}</td>
				<td>{{$conta->valor}}</td>
				<td>{{$conta->data_pagamento}}</td>
				<td>{{$conta->created_at}}</td>
				<td>{{$conta->responsavel_pagamento}}</td>				
			</tr>
			@endforeach
		</tbody>
	</table>
</div>


@stop

@section('css')
    <link rel="stylesheet" href="#">
@stop

@section('js')
    <script>

    </script>
@stop