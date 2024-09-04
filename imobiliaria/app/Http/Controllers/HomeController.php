<?php

namespace App\Http\Controllers;

use App\Models\Imovel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Busque 5 imóveis em destaque, por exemplo, ordenados por data de criação ou qualquer outro critério
        $destaques = Imovel::orderBy('created_at', 'desc')->take(6)->get();

        return view('welcome', compact('destaques'));
    }
}
