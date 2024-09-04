@extends('layouts.main')

@section('title', 'Detalhes do Imóvel')

@section('content')
    <div class="imovel-details">
        <h1>{{ $imovel->titulo }}</h1>

        <!-- Image Carousel -->
        <div id="imovelCarousel" class="carousel slide mt-4" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach($imovel->imagens as $index => $imagem)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        <img src="{{ Storage::url($imagem->caminho_imagem) }}" class="d-block w-100"
                             alt="Imagem {{ $index + 1 }}">
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#imovelCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#imovelCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="imovel-info">
            <p><strong>Descrição:</strong> {{ $imovel->descricao }}</p>
            <p><strong>Tipo:</strong> {{ $imovel->tipo_imovel }}</p>
            <p><strong>Categorias:</strong>
                @if(is_array(json_decode($imovel->categorias, true)))
                    {{ implode(', ', json_decode($imovel->categorias)) }}
                @else
                    {{ $imovel->categorias }}
                @endif
            </p>
            <p><strong>Valor:</strong> R$ {{ number_format($imovel->valor, 2, ',', '.') }}</p>
            <p><strong>Corretor:</strong> {{ $imovel->corretor->nome }}</p>
        </div>

        <div class="imovel-actions mt-4">
            <a href="{{ route('imoveis.index') }}" class="btn btn-primary">Voltar à lista de imóveis</a>
        </div>
    </div>
@endsection
