<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Corretor;
use App\Models\Admin;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');


        if ($request->has('adminCheck')) {
            if (Auth::guard('admin')->attempt(['email' => $credentials['email'], 'senha' => $credentials['password']])) {
                return redirect()->route('dashboard');
            }
        }


        if ($request->has('corretorCheck')) {
            if (Auth::guard('corretor')->attempt(['email' => $credentials['email'], 'senha' => $credentials['password']])) {
                return redirect()->route('imoveis');
            }
        }

        return redirect()->back()->withErrors(['login' => 'Credenciais inválidas']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
