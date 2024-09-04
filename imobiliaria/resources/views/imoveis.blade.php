@extends('layouts.main')

@section('title', 'D&R Housing - Imóveis')

@section('content')

    <div class="container">
        <!-- Seção de Busca -->
        <div class="search-section text-center">
            <h1>ENCONTRE SEU IMÓVEL DOS SONHOS</h1>
            <form action="{{ route('imoveis.index') }}" method="GET" class="search-bar">
                <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}">
                <button type="submit">PESQUISAR</button>
            </form>
        </div>

        <!-- Seção de Imóveis -->
        <div class="property-grid container">
            <div class="row">
                @foreach ($imoveis as $imovel)
                    <div class="col-12 col-lg-6 mb-4"> <!-- Full width on small screens, half width on large screens -->
                        <div class="property-card">
                            @if($imovel->primeiraImagem())
                                <img src="{{ Storage::url($imovel->primeiraImagem()->caminho_imagem) }}" class="img-fluid" alt="Imagem do Imóvel">
                            @else
                                <p>No image available for this imovel.</p>
                            @endif
                            <div class="property-info p-3">
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
