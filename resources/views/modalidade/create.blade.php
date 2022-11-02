@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

	<div class="container">
		<h1>Cadastrar Modalidade</h1>
	</div>
    
@stop

@section('content')

<div class="container">
	<form action="{{ route('modalidade.store') }}" method="POST">
		@csrf
		<div class="card-body">
			<div class="form-group">
				<label for="exampleInputEmail1">Nome</label>
				<input type="text" class="form-control" name="nome" placeholder="Nome da Modalidade">
			</div>
			<div class="form-group" data-select2-id="44">
				<label>Ativo</label>
				<select class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" name="ativo">
					<option selected="selected" data-select2-id="1">Sim</option>
					<option data-select2-id="0">Não</option>
				</select>
			</div>
		</div>

		<div class="card-footer">
			<button type="submit" class="btn btn-primary">Cadastrar</button>
		</div>
	</form>
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