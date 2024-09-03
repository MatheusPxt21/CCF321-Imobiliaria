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
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'nullable|string',
        ]);

        // Create a new Visitante record
        Visitante::create([
            'nome' => $request->input('name'),
            'telefone' => $request->input('phone'),
            'mensagem' => $request->input('message'),
            'horario' => now()->format('H:i:s'), // Store the current time as the horario
            'data' => now()->format('Y-m-d'), // Store the current date as the data
        ]);

        // Optionally, redirect back with a success message
        return redirect()->back()->with('success', 'Mensagem enviada com sucesso!');
    }
}
