@extends('layouts.main')

@section('title', 'D&R Housing - Imóveis')

@section('content')

    <div class="container">
        <!-- Seção de Busca -->
        <div class="search-section text-center">
            <h1>ENCONTRE SEU IMÓVEL DOS SONHOS</h1>
            <div class="search-bar">
                <input type="text" placeholder="Search...">
                <button type="button">PESQUISAR</button>
            </div>
        </div>

        <!-- Seção de Imóveis -->
        <div class="property-grid">
            @foreach ($imoveis as $imovel)
                <div class="property-card">
                    <img src="{{ asset('storage/' . $imovel->image_path) }}" alt="Imagem do Imóvel">
                    <div class="property-info">
                        <h3>{{ $imovel->titulo }}</h3>
                        <p>{{ $imovel->descricao }}</p>
                        <button class="btn">Saiba mais</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
