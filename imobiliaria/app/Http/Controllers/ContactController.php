<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitante;

class ContactController extends Controller
{
    /**
     * Handle the form submission and add a new Visitante to the database.
     */
    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'nullable|string',
        ]);

        Visitante::create([
            'nome' => $request->input('name'),
            'telefone' => $request->input('phone'),
            'mensagem' => $request->input('message'),
            'horario' => now()->format('H:i:s'),
            'data' => now()->format('Y-m-d'),
        ]);

        return redirect()->back()->with('success', 'Mensagem enviada com sucesso!');
    }
}
