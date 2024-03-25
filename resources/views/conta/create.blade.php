@extends('adminlte::page')

@section('title', 'Conta - Cadastrar')

@section('content_header')

    <div class="container">
        <h1>Cadastrar Nova Conta</h1>
    </div>

@stop

@section('content')

    <div class="container">
        <form action="{{ route('conta.store') }}" method="POST">
            @csrf
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class="card-body">
                <div class="form-group" data-select2-id="44">
                    <label>Modalidade</label>
                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1"
                        aria-hidden="true" name="modalidade_id" required>
                        <option selected="selected" value="">Selecione a modalidade</option>
                        @foreach ($modalidades as $modalidade)
                            <option value="{{ $modalidade->id }}">{{ $modalidade->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group" data-select2-id="44">
                    <label>Forma Pagamento</label>
                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1"
                        aria-hidden="true" name="modalidade_pagamento_id" required>
                        <option selected="selected" value="">Selecione a forma de pagamento</option>
                        <option value="1">Débito</option>
                        <option value="2">Nubank</option>
                        <option value="3">Sicoob Credicom</option>
                        <option value="4">Banco do Brasil</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome da Conta"
                        required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Valor</label>
                    <input type="text" class="form-control" id="moeda" name="valor" placeholder="valor" required>
                </div>
                <div class="form-group">
                    <label>Data Pagamento:</label>
                    <div class="input-group date">
                        <input type="date" class="form-control" name="data_pagamento" required>
                    </div>
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

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />

    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.css') }}">

    <link rel="stylesheet" href="{{ asset('vendor/datepicker/daterangepicker.css') }}">

@stop

@section('js')
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('vendor/datepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/dist/js/adminlte.js') }}"></script>
    <script type="module" src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.esm.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.js"></script>

@stop
