<?php

namespace App\Http\Controllers;

use App\Models\Visitante;

class CorretorController extends Controller
{
    public function showVisitas()
    {
        $visitas = Visitante::all();
        return view('corretores.create.index', compact('visitas'));
    }
}
