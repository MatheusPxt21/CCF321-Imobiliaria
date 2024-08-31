<?php

namespace App\Http\Controllers;

use App\Models\Imovel;

class ImovelController extends Controller
{
    public function index()
    {
        $imoveis = Imovel::with('imagens')->get();
        return view('imoveis', compact('imoveis'));
    }
}
