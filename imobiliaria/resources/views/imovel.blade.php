@extends('layouts.main')

@section('title', 'Detalhes do Imóvel')

@section('content')
    <div class="imovel-details">

        <div class="imovel-actions mt-4">
            <a href="{{ route('imoveis.index') }}" class="btn btn-primary">Voltar à lista de imóveis</a>
        </div>

        <h1>{{ $imovel->titulo }}</h1>

        <div class="imovel-gallery mt-4">
            @foreach($imovel->imagens as $imagem)
                <div class="imovel-gallery-item">
                    <img src="{{ Storage::url($imagem->caminho_imagem) }}" alt="Imagem do imóvel" class="img-fluid">
                </div>
            @endforeach
        </div>

        <div class="imovel-info mt-4">
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
            <p><strong>Corretor:</strong>
                <a href="{{ route('corretor.show', $imovel->corretor->id) }}">
                    {{ $imovel->corretor->nome }}
                </a>
            </p>
        </div>

        <div class="form-section mt-4">
            <h3>Agende sua Visita:</h3>
            <form class="contact-form" method="POST" action="{{ route('contato.submit') }}">
                @csrf
                <div class="mb-3">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Insira seu nome" required>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Insira um telefone para contato" required>
                </div>
                <div class="mb-3">
                    <input type="date" class="form-control" name="date" id="date" required>
                </div>
                <div class="mb-3">
                    <input type="time" class="form-control" name="time" id="time" required>
                </div>
                <div class="mb-3">
                    <textarea class="form-control" name="message" id="message" rows="3" readonly>
                        Visita agendada para o imóvel {{ $imovel->id }}
                    </textarea>
                </div>
                <button type="submit" class="btn btn-custom">Enviar</button>
            </form>
        </div>
    </div>
@endsection
