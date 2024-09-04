<?php

namespace App\Http\Controllers;

use App\Models\Imagem;
use App\Models\Imovel;
use Illuminate\Http\Request;
use App\Models\Corretor;
use function Laravel\Prompts\error;

class ImovelController extends Controller
{
    /**
     * Display a listing of the imoveis.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $imoveis = Imovel::with('imagens')
            ->when($search, function ($query, $search) {
                return $query->where('titulo', 'like', '%' . $search . '%');
            })
            ->get();

        return view('imoveis', compact('imoveis', 'search'));
    }


    public function display()
    {
        // Recuperar todos os corretores
        $corretores = Corretor::all();

        // Passar os corretores para a view
        return view('adicionar_imovel', compact('corretores'));
    }

    /**
     * Display the specified imovel.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function show($id)
    {
        $imovel = Imovel::with('imagens')->findOrFail($id);

        return view('imovel', compact('imovel'));
    }

    /**
     * Show the form for creating a new imovel.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function create()
    {
        return view('imoveis.create');
    }

    /**
     * Store a newly created imovel in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validação dos dados
        $validatedData = $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'tipo' => 'required|in:Casa,Apartamento,Comercial,Terreno',
            'categorias' => 'required|string',
            'valor' => 'nullable|numeric|min:0',
            'corretor_id' => 'required|exists:corretores,id', // Validação do corretor_id
            'imagens.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Criação do Imóvel
        $imovel = Imovel::create([
            'titulo' => $validatedData['titulo'],
            'descricao' => $validatedData['descricao'],
            'tipo' => $validatedData['tipo'],
            'categorias' => $validatedData['categorias'],
            'valor' => $validatedData['valor'],
            'corretor_id' => $validatedData['corretor_id'], // Salvando o corretor_id
        ]);

        // Processamento das imagens
        if ($request->hasFile('imagens')) {
            foreach ($request->file('imagens') as $imagem) {
                // Armazenar a imagem
                $path = $imagem->store('imgs/photos', 'public');

                // Salvar a imagem no banco de dados
                Imagem::create([
                    'imovel_id' => $imovel->id,
                    'caminho_imagem' => $path,
                ]);
            }
        }

        return redirect()->route('imoveis.index')->with('success', 'Imóvel criado com sucesso!');
    }

    /**
     * Show the form for editing the specified imovel.
     *
     * @param \App\Models\Imovel $imovel
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function edit(Imovel $imovel)
    {
        return view('imoveis.edit', compact('imovel'));
    }

    /**
     * Update the specified imovel in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Imovel $imovel
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Imovel $imovel)
    {
        $validatedData = $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'tipo_imovel' => 'required|in:Casa,Apartamento,Comercial,Terreno',
            'categorias' => 'required|json',
            'valor' => 'nullable|numeric|min:0',
            'corretor_id' => 'required|exists:corretores,id',
        ]);

        $imovel->update($validatedData);

        return redirect()->route('imoveis.index')->with('success', 'Imóvel atualizado com sucesso!');
    }

    /**
     * Remove the specified imovel from storage.
     *
     * @param \App\Models\Imovel $imovel
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Imovel $imovel)
    {
        $imovel->delete();

        return redirect()->route('imoveis.index')->with('success', 'Imóvel deletado com sucesso!');
    }
}
