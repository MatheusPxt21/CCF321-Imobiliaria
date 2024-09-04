@extends('layouts.main')

@section('title', 'D&R Housing')

@section('content')

<div class="home-container">

    <!-- Seção de Imagem Principal -->
    <section class="hero-section">
        <div class="hero-content" style="margin-inline: 10rem;">
            <div class="home_img-hero-section">
                <div class="home_banner">
                    <img src="/imgs/banner.png" class="img-fluid">
                </div>
            </div>
            <div class="home_hero-text">
                <h1>Construindo Lares</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vel massa pulvinar, scelerisque odio sed, sodales sapien. Quisque vehicula lectus nec nunc dapibus, vitae sagittis velit ultrices.</p>
                <a href="/contato" class="btn btn-custom">Saiba Mais</a>
            </div>
        </div>
    </section>

    <!-- Seção de Destaques -->
    <section class="home_highlight-section">
        <h2>Destaques</h2>
        <div class="home_highlights-cards">
            <div class="row home_highlight-card-row">
                @foreach($destaques as $imovel)
                    <div class="col-md-4 home_highlight-card">
                        <div class="home_highlight-item">
                            <!-- Exibe a primeira imagem do imóvel, se existir -->
                            @if($imovel->imagens->isNotEmpty())
                                <img src="{{ asset('storage/' . $imovel->imagens->first()->caminho_imagem) }}" class="img-fluid">
                            @else
                                <img src="/imgs/default.jpg" class="img-fluid" alt="Imagem do imóvel">
                            @endif
                            <div class="home_highlight-text">
                                <h4>{{ $imovel->titulo }}</h4>
                                <p>{{ \Illuminate\Support\Str::limit($imovel->descricao, 50) }}</p>
                                <a href="{{ route('imovel.show', $imovel->id) }}" class="btn btn-custom">Saiba Mais</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

</div>

@endsection
