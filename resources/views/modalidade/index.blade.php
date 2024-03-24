@extends('adminlte::page')

@section('title', 'Modalidade')

@section('content_header')
	<div class="container">
		<h1>Modalidades</h1>
	</div>
@stop

@section('content')

<div class="container">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th style="width: 10px">#</th>
				<th>Nome</th>
				<th>Modalidade Fixa</th>
				<th>Responsável Cadastro</th>
				<th style="width: 40px">Ativo</th>
			</tr>
		</thead>
		<tbody>
			@foreach($modalidades as $modalidade)
			<tr>
				<td>{{$modalidade->id}}</td>
				<td>{{$modalidade->nome}}</td>
				<td>{{$modalidade->modalidade_fixa == 0 ? 'Não' : 'Sim'}}</td>
				<td>{{$modalidade->responsavel_pagamento}}</td>
				<td>{{$modalidade->ativo}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>


@stop

@section('css')
@stop

@section('js')
@stop