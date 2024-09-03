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
            'role' => 'required|in:admin,corretor', // role should be either 'admin' or 'corretor'
        ]);

        // Determine the role and attempt login
        if ($request->role === 'admin') {
            $user = Admin::where('email', $request->email)->first();
        } elseif ($request->role === 'corretor') {
            $user = Corretor::where('email', $request->email)->first();
        }

        // Check if user exists and password is correct
        if ($user && Hash::check($request->senha, $user->senha)) {
            // Optionally, log the user in using Laravel's auth system
            Auth::login($user);

            if ($request->role === 'admin') {
                return redirect()->route('admin.corretores');
            } else {
                return redirect('/');
            }
        }

        return response()->json([
            'message' => 'Invalid credentials',
        ], 401);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
