@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard - {{ auth()->user()->name }}</h1>
@stop

@section('content')

<div class="row">
    
    <div class="callout callout-info">
        <h5>Mês de referência</h5>
        <p><b>Novembro</b> - 2023</p>
    </div>

</div>

<div class="row">
    <div class="col-lg-3 col-6">

        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$contas->count()}}</h3>
                <p>Total Contas Pagas</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="{{route('conta.index')}}" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">

        <div class="small-box {{$contasPendentes == 0 ? 'bg-success' : 'bg-danger'}}">
            <div class="inner">
                <h3>{{$contasPendentes}}</h3>
                <p>Contas Fixas Pendentes</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">

        <div class="small-box bg-success">
            <div class="inner">
                <h3>R$ {{$totalPagamento}}</h3>
                <p>Valor Total Pago</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">

        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{$usuarios->count()}}</h3>
                <p>Usuários Cadastrados</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

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