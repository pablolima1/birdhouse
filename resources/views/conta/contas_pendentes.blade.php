@extends('adminlte::page')

@section('title', 'Conta - Cadastrar')

@section('content_header')

	<div class="container">
		<h1>Contas Pendentes de Pagamento</h1>
	</div>
    
@stop

@section('content')

<div class="container">
	<div class="card">
		<div class="card-body p-0">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Modalidade</th>
						<th>Fixa</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($contasNaoPagas as $conta)
						<tr>
							<td>{{ $conta->nome }}</td>
							<td>{{ $conta->modalidade_fixa ? 'Sim' : 'Não' }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ionic/core/css/ionic.bundle.css" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />

<link rel="stylesheet" href="{{asset('vendor/adminlte/dist/css/adminlte.css')}}">

<link rel="stylesheet" href="{{asset('vendor/datepicker/daterangepicker.css')}}">

@stop

@section('js')
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
<script src="{{asset('vendor/datepicker/daterangepicker.js')}}"></script>
<script src="{{asset('vendor/adminlte/dist/js/adminlte.js')}}"></script>
<script type="module" src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.esm.js"></script>
<script nomodule src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.js"></script>

@stop