<?php

namespace App\Http\Controllers;

use App\Models\Imovel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $destaques = Imovel::orderBy('created_at', 'desc')->take(6)->get();

        return view('welcome', compact('destaques'));
    }
}
