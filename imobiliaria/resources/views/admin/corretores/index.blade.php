@extends('layouts.admin')

@section('title', 'D&R Housing - Corretores')

@section('content')
    <div class="container">
        <h1>Corretores</h1>
        <a href="{{ route('admin.corretores.create') }}" class="btn btn-primary">Adicionar Corretor</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($corretores as $corretor)
                    <tr>
                        <td>{{ $corretor->nome }}</td>
                        <td>{{ $corretor->email }}</td>
                        <td>
                            <a href="{{ route('admin.corretores.show', $corretor->id) }}" class="btn btn-info">Ver</a>
                            <form action="{{ route('admin.corretores.delete', $corretor->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
