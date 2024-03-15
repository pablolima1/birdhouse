@extends('adminlte::page')

@section('title', 'Contas')

@section('content_header')

@stop

@section('content')

<div class="container">

	<div class="row mt-4">
		<div class="card w-100">
				<div class="card-header">
					Usuários Registrados
				</div>
				<div class="card-body p-0">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>Nome</th>
								<th>E-mail</th>
							</tr>
						</thead>
						<tbody>
							@foreach($usuarios as $usuario)
							<tr>
								<td>{{$usuario->id}}</td>
								<td>{{$usuario->name}}</td>
								<td>{{$usuario->email}}</td>
							</tr>
							@endforeach							
						</tbody>
					</table>
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