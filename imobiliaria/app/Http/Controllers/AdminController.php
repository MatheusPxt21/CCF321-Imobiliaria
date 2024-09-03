<?php

namespace App\Http\Controllers;

use App\Models\Corretor;
use App\Models\Imovel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Obtendo alguns dados para exibir no dashboard
        $totalCorretores = Corretor::count();
        $totalImoveis = Imovel::count();

        return view('admin.dashboard', compact('totalCorretores', 'totalImoveis'));
    }
}
