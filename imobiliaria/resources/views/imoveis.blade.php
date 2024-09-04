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
                    @if($imovel->primeiraImagem())
                        <img src="{{ Storage::url($imovel->primeiraImagem()->caminho_imagem) }}" alt="Imagem do Imóvel">
                    @else
                        <p>No image available for this imovel.</p>
                    @endif
                    <div class="property-info">
                        <h3>{{ $imovel->titulo }}</h3>
                        <p>{{ $imovel->descricao }}</p>
                        <a href="{{ route('imovel.show', $imovel->id) }}" class="btn btn-custom">Saiba Mais</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
