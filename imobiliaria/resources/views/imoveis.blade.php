@extends('layouts.main')

@section('title', 'D&R Housing - Imóveis')

@section('content')

    <div class="container">
        <!-- Seção de Busca -->
        <div class="search-section text-center mb-5">
            <h1>ENCONTRE SEU IMÓVEL DOS SONHOS</h1>
            <form action="{{ route('imoveis.index') }}" method="GET" class="search-bar">
                <input type="text" name="search" placeholder="Buscar por título ou descrição..." value="{{ request('search') }}">
                <button type="submit">PESQUISAR</button>
            </form>
        </div>

        <!-- Seção de Imóveis -->
        <div class="property-grid container">
            <div class="row justify-content-center"> <!-- Center the cards in the row -->
                @foreach ($imoveis as $imovel)
                    <div class="col-12 col-lg-5 mb-4 d-flex justify-content-center"> <!-- Full width on small screens, half width on large screens, centered -->
                        <div class="property-card">
                            @if($imovel->primeiraImagem())
                                <img src="{{ Storage::url($imovel->primeiraImagem()->caminho_imagem) }}"
                                     style="width: 400px; height: 200px; object-fit: cover; object-position: center;"
                                     alt="Imagem do Imóvel">
                            @else
                                <p>No image available for this imovel.</p>
                            @endif
                            <div class="property-info p-3"> <!-- Keep content left-aligned -->
                                <h3>{{ $imovel->titulo }}</h3>
                                <p>{{ \Illuminate\Support\Str::limit($imovel->descricao, 50) }}</p>
                                <a href="{{ route('imovel.show', $imovel->id) }}" class="btn btn-custom">Saiba Mais</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
