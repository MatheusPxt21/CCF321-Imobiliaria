@extends('layouts.main')

@section('title', 'D&R Housing - Add Corretores')

@section('content')
    <div class="container">
        <h1>Adicionar Corretor</h1>
        <form action="{{ route('admin.corretores.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" name="senha" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <textarea name="descricao" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
@endsection
