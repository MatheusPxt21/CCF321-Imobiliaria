@extends('layouts.main')

@section('title', 'D&R Housing - Corretor')

@section('content')
    <div class="container">
        <h1>Perfil do Corretor</h1>
        <p><strong>Nome:</strong> {{ $corretor->nome }}</p>
        <p><strong>Email:</strong> {{ $corretor->email }}</p>
        <p><strong>Descrição:</strong> {{ $corretor->descricao }}</p>
        <a href="{{ route('admin.corretores') }}" class="btn btn-secondary">Voltar</a>
    </div>
@endsection
