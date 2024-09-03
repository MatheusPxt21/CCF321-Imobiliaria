@extends('layouts.main')

@section('title', 'D&R Housing')

@section('content')

<div class="home-container">

    <!-- Seção de Imagem Principal -->
    <section class="hero-section">
        <div class="img-hero-section">
            <div class="banner">
                <img src="/imgs/banner.png" class="img-fluid">
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
            <div>
        </div>
        <div class="hero-text">
            <h1>Cosntruindo Lares</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vel massa pulvinar, scelerisque odio sed, sodales sapien. Quisque vehicula lectus nec nunc dapibus, vitae sagittis velit ultrices.</p>
            <a href="#" class="btn btn-custom">Saiba Mais</a>
        </div>
    </section>

    <!-- Seção de Destaques -->
    <section class="highlights-section">
        <h2>Destaques</h2>
        <div class="highlights-cards">
            <div class="row highlight-card-row">
                <div class="col-md-3 highlight-card">
                    <div class="highlight-item">
                        <img src="/imgs/highlight1.jpg" class="img-fluid">
                        <div class="highlight-text">
                            <h4>Lorem Ipsum</h4>
                            <p>Lorem ipsum dolor sit amet.</p>
                            <a href="#" class="btn btn-custom">Saiba Mais</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 highlight-card">
                    <div class="highlight-item">
                        <img src="/imgs/highlight2.jpg" class="img-fluid">
                        <div class="highlight-text">
                            <h4>Lorem Ipsum</h4>
                            <p>Lorem ipsum dolor sit amet.</p>
                            <a href="#" class="btn btn-custom">Saiba Mais</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row highlight-card-row">
                <div class="col-md-3 highlight-card">
                    <div class="highlight-item">
                        <img src="/imgs/highlight1.jpg" class="img-fluid">
                        <div class="highlight-text">
                            <h4>Lorem Ipsum</h4>
                            <p>Lorem ipsum dolor sit amet.</p>
                            <a href="#" class="btn btn-custom">Saiba Mais</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 highlight-card">
                    <div class="highlight-item">
                        <img src="/imgs/highlight2.jpg" class="img-fluid">
                        <div class="highlight-text">
                            <h4>Lorem Ipsum</h4>
                            <p>Lorem ipsum dolor sit amet.</p>
                            <a href="#" class="btn btn-custom">Saiba Mais</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Seção de Texto e Imagem -->
    <section class="text-image-section">
        <div class="row">
            <div class="col-md-8">
                <h2>Lorem Ipsum</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vel massa pulvinar, scelerisque odio sed, sodales sapien. Quisque vehicula lectus nec nunc dapibus, vitae sagittis velit ultrices.</p>
            </div>
            <div class="col-md-4">
                <img src="/imgs/building.jpg" class="img-fluid">
            </div>
        </div>
    </section>
</div>

@endsection
