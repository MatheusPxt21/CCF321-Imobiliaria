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
                    <p>Nossa missão é encontrar o imóvel perfeito para você. Com uma ampla seleção de casas, apartamentos e terrenos, oferecemos atendimento personalizado e as melhores oportunidades do mercado. Seu novo lar começa aqui!</p>
                    <a href="/contato" class="btn btn-custom">Saiba Mais</a>
                </div>
            </div>
        </section>

        <!-- Seção de Destaques -->
        <section class="home_highlight-section">
            <h2 class="text-center">Destaques</h2>
            <div class="home_highlights-cards d-flex justify-content-center flex-wrap">
                @foreach($destaques as $imovel)
                    <div class="home_highlight-card m-3">
                        <div class="home_highlight-item">
                            @if($imovel->imagens->isNotEmpty())
                                <img src="{{ Storage::url($imovel->primeiraImagem()->caminho_imagem) }}"
                                     style="width: 400px; height: 200px; object-fit: cover; object-position: center;"
                                     alt="Imagem do Imóvel">
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
        </section>

    </div>

@endsection
