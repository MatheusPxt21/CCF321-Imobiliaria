<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Corretor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email',
            'senha' => 'required',
            'role' => 'required|in:admin,corretor',
        ]);

        if ($request->role === 'admin') {
            $user = Admin::where('email', $request->email)->first();
        } elseif ($request->role === 'corretor') {
            $user = Corretor::where('email', $request->email)->first();
        }

        if ($user && Hash::check($request->senha, $user->senha)) {
            Auth::login($user);

            if ($request->role === 'admin') {
                return redirect()->route('admin.corretores');
            } elseif ($request->role === 'corretor') {
                return redirect()->route('corretor.index');
            }
        }

        return redirect('/login')->withErrors(['email' => 'Credenciais inválidas']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
