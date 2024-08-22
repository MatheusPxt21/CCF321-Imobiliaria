@extends('layouts.main')

@section('title', 'D&R Housing - Login')

@section('content')

    <div class="loginPage">
    <div class="login-container">
        <form class="login-form" method="POST" action="{{ route('login') }}">
            @csrf
            <h2 class="text-center">LOGIN</h2>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Digite seu email">
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Digite sua senha">
            </div>
            <div class="mb-3 d-flex justify-content-between">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="adminCheck">
                    <label class="form-check-label" for="adminCheck">Admin</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="corretorCheck">
                    <label class="form-check-label" for="corretorCheck">Corretor</label>
                </div>
            </div>
            <button type="submit" class="btn btn-custom w-100">ENTRAR</button>
        </form>
    </div>
    </div>


@endsection
