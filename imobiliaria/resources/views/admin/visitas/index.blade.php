@extends('layouts.admin')

@section('title', 'D&R Housing - Visitas')

@section('content')
    <div class="container">
        <h1>Visitas</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Nome do Visitante</th>
                    <th>Telefone</th>
                    <th>Data</th>
                    <th>Horário</th>
                    <th>Mensagem</th>
                </tr>
            </thead>
            <tbody>
                @foreach($visitas as $visita)
                    <tr>
                        <td>{{ $visita->nome }}</td>
                        <td>{{ $visita->telefone }}</td>
                        <td>{{ $visita->data }}</td>
                        <td>{{ $visita->horario }}</td>
                        <td>{{ $visita->mensagem }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
