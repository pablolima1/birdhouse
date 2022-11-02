@extends('adminlte::page')

@section('title', 'Modalidade')

@section('content_header')
	<div class="container">
		<h1>Cadastrar Modalidade</h1>
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ionic/core/css/ionic.bundle.css" />
@stop

@section('js')
    <script type="module" src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.esm.js"></script>
<script nomodule src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.js"></script>
@stop