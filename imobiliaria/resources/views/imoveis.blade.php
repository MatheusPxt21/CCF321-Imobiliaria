@extends('layouts.main')

@section('title', 'D&R Housing - Imoveis')

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
            @for ($i = 0; $i < 8; $i++)
                <div class="property-card">
                    <img src="{{ asset('path/to/image.jpg') }}" alt="Imagem do Imóvel">
                    <div class="property-info">
                        <h3>Lorem Ipsum</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <button class="btn">Saiba mais</button>
                    </div>
                </div>
            @endfor
        </div>
    </div>

@endsection
