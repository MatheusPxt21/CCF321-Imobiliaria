@extends('layouts.main')

@section('title', 'Detalhes do Imóvel')

@section('content')
    <div class="imovel-details">
        <h1>{{ $imovel->titulo }}</h1>

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

        <div class="imovel-actions">
            <a href="{{ route('imoveis.index') }}" class="btn btn-primary">Voltar à lista de imóveis</a>
        </div>
    </div>
@endsection
