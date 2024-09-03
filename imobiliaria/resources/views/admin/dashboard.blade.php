@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Admin Dashboard</h1>

    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Total de Corretores</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $totalCorretores }}</h5>
                    <p class="card-text">Corretores cadastrados no sistema.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Total de Imóveis</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $totalImoveis }}</h5>
                    <p class="card-text">Imóveis cadastrados no sistema.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Ações Rápidas</div>
                <div class="card-body">
                    <a href="{{ route('corretores.index') }}" class="btn btn-light">Gerenciar Corretores</a>
                    <a href="{{ route('imoveis.index') }}" class="btn btn-light">Gerenciar Imóveis</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
