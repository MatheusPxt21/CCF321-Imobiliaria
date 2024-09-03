<?php

namespace App\Http\Controllers;

use App\Models\Corretor;
use App\Models\Visitante;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Exibir todos os corretores
    public function showCorretores() {
        $corretores = Corretor::all();
        //dd($corretores);
        return view('admin.corretores.index', compact('corretores'));
    }

    // Formulário para criar um novo corretor
    public function createCorretor() {
        return view('admin.corretores.create');
    }

    // Salvar o novo corretor no banco de dados
    public function storeCorretor(Request $request) {
        $request->validate([
            'email' => 'required|email|unique:corretores',
            'senha' => 'required|min:6',
            'nome' => 'required',
        ]);

        $corretor = new Corretor();
        $corretor->email = $request->input('email');
        $corretor->senha = bcrypt($request->input('senha'));
        $corretor->nome = $request->input('nome');
        $corretor->descricao = $request->input('descricao');
        $corretor->save();

        return redirect()->route('admin.corretores')->with('success', 'Corretor criado com sucesso!');
    }

    // Exibir o perfil de um corretor específico
    public function showCorretor($id) {
        $corretor = Corretor::findOrFail($id);
        return view('admin.corretores.show', compact('corretor'));
    }

    // Deletar um corretor
    public function deleteCorretor($id) {
        $corretor = Corretor::findOrFail($id);
        $corretor->delete();

        return redirect()->route('admin.corretores')->with('success', 'Corretor excluído com sucesso!');
    }

    // Exibir todas as visitas
    public function showVisitas() {
        $visitas = Visitante::all();
        return view('admin.visitas.index', compact('visitas'));
    }
}
