<?php

namespace App\Http\Controllers;

use App\Models\Imovel;
use App\Models\Visitante;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ImovelController;

class CorretorController extends Controller
{
    public function showVisitas()
    {
        $visitas = Visitante::all();
        return view('corretores.create.index', compact('visitas'));
    }

    public function index()
    {
        $corretor = Auth::user();
        $imoveis = Imovel::where('corretor_id', $corretor->id)->get();

        // Filtrar visitas que estão associadas aos imóveis do corretor
        $imovelIds = $imoveis->pluck('id'); // Pega os IDs dos imóveis do corretor
        $visitas = Visitante::whereIn('mensagem', function ($query) use ($imovelIds) {
            $query->select('id')
                  ->from('imoveis')
                  ->whereIn('id', $imovelIds)
                  ->pluck('id')
                  ->map(function ($id) {
                      return "Visita agendada para o imóvel {$id}";
                  });
        })->get();

        return view('corretor.index', compact('imoveis', 'visitas'));
    }


}
