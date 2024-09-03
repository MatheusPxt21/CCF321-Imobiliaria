@extends('layouts.main')

@section('title', 'Adicionar Imóvel')

@section('content')
    <div class="container mt-5">
        <h2>Adicionar Novo Imóvel</h2>
        <form method="POST" action="{{ route('imovel.store') }}">
            @csrf
            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo"
                       placeholder="Insira o título do imóvel" required>
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea class="form-control" id="descricao" name="descricao" rows="4"
                          placeholder="Insira a descrição do imóvel" required></textarea>
            </div>
            <div class="mb-3">
                <label for="tipo" class="form-label">Tipo de Imóvel</label>
                <select class="form-control" id="tipo" name="tipo" required>
                    <option value="casa">Casa</option>
                    <option value="apartamento">Apartamento</option>
                    <option value="comercial">Comercial</option>
                    <!-- Add more types as needed -->
                </select>
            </div>
            <div class="mb-3">
                <label for="categorias" class="form-label">Categorias</label>
                <input type="text" class="form-control" id="categorias" name="categorias"
                       placeholder="Insira as categorias, separadas por vírgula" required>
            </div>
            <div class="mb-3">
                <label for="valor" class="form-label">Valor do Imóvel</label>
                <input type="number" class="form-control" id="valor" name="valor" placeholder="Insira o valor do imóvel"
                       required>
            </div>
            <button type="submit" class="btn btn-primary">Adicionar Imóvel</button>
        </form>
    </div>
@endsection
