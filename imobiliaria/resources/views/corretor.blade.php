@extends('layouts.main')

@section('title', 'D&R Housing - Corretor')

@section('content')

<div class="corretorContent">

    <div class="container my-5">
        <div class="row align-items-center">
            <div class="col-md-6">
                <img src="path/to/corretor-image.jpg" class="img-fluid" alt="Corretor">
            </div>
            <div class="col-md-6">
                <h2 class="text-center text-uppercase bg-brown p-2 text-brown">Corretor Nome</h2>
                <p class="mt-3">
                    Descrição sobre o corretor Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque et congue massa, ac suscipit enim. Maecenas at dui eu magna porttitor vestibulum sit amet eget leo. Aenean id felis condimentum, ultricies leo sit amet, tincidunt massa. Maecenas at dictum erat, ut nec massa sit amet lorem facilisis mattis.
                </p>
            </div>
        </div>

        <div class="row my-5">
            <div class="col-12">
                <h3 class="text-uppercase text-center mb-4">Destaques</h3>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card">
                    <img src="path/to/property1.jpg" class="card-img-top" alt="Imóvel 1">
                    <div class="card-body text-center">
                        <h5 class="card-title">Lorem Ipsum</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <a href="#" class="btn btn-outline-dark">Saiba mais</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card">
                    <img src="path/to/property2.jpg" class="card-img-top" alt="Imóvel 2">
                    <div class="card-body text-center">
                        <h5 class="card-title">Lorem Ipsum</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <a href="#" class="btn btn-outline-dark">Saiba mais</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
