@extends('layouts.corretor')

@section('title', 'D&R Housing - Corretor Dashboard')

@section('content')
    <div class="corretor-dashboard">
        <h1>Bem-vindo, {{ Auth::user()->nome }}</h1>

        <h2>Imóveis sob sua responsabilidade</h2>
        <ul>
            @foreach ($imoveis as $imovel)
                <li>
                    <h3>{{ $imovel->titulo }}</h3>
                    <p>{{ $imovel->descricao }}</p>
                </li>
            @endforeach
        </ul>

        <h2>Visitas Agendadas para seus Imóveis:</h2>
        <ul>
            @foreach ($visitas as $visita)
                <li>
                    <p>Nome: {{ $visita->nome }}</p>
                    <p>Telefone: {{ $visita->telefone }}</p>
                    <p>Data: {{ $visita->data }}</p>
                    <p>Horário: {{ $visita->horario }}</p>
                    <p>Mensagem: {{ $visita->mensagem }}</p>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
