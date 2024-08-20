@extends('layouts.main')

@section('title', 'D&R Housing - Contato')

@section('content')
<div class="contact-container">
    <div class="location-section">
        <h3>Onde Estamos?</h3>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15007.521706323394!2d-44.42251267403562!3d-19.88727038197307!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xa7209319aee067%3A0xcc05e354112537c!2sUniversidade%20Federal%20de%20Vi%C3%A7osa%20-%20Campus%20Florestal!5e0!3m2!1spt-BR!2sbr!4v1724110878209!5m2!1spt-BR!2sbr" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="form-section">
        <h3>Fale Conosco:</h3>
        <form class="contact-form">
            <div class="mb-3">
                <input type="text" class="form-control" id="name" placeholder="Insira seu nome">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" id="phone" placeholder="Insira um telefone para contato">
            </div>
            <div class="mb-3">
                <textarea class="form-control" id="message" rows="3" placeholder="Deixe aqui sua mensagem"></textarea>
            </div>
            <button type="submit" class="btn btn-custom">Enviar</button>
        </form>
    </div>
</div>
@endsection
