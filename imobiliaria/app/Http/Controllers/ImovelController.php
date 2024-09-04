<?php

namespace App\Http\Controllers;

use App\Models\Imagem;
use App\Models\Imovel;
use Illuminate\Http\Request;

class ImovelController extends Controller
{
    /**
     * Display a listing of the imoveis.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        // Fetch all imoveis from the database
        $imoveis = Imovel::all();

        // Pass the imoveis to the view
        return view('imoveis', compact('imoveis'));
    }

    public function display()
    {
        return view('adicionar_imovel');
    }

    /**
     * Display the specified imovel.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function show($id)
    {
        // Retrieve the imovel along with its related images
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
        // Validate the request data
        $validatedData = $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'tipo' => 'required|in:Casa,Apartamento,Comercial,Terreno',
            'categorias' => 'required|string',
            'valor' => 'nullable|numeric|min:0',
            'imagens.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // validate images
        ]);

        // Create a new Imovel instance and save it to the database
        $imovel = Imovel::create([
            'titulo' => $validatedData['titulo'],
            'descricao' => $validatedData['descricao'],
            'tipo' => $validatedData['tipo'],
            'categorias' => $validatedData['categorias'],
            'valor' => $validatedData['valor'],
            'corretor_id' => 9,
        ]);

        // Handle image uploads
        if ($request->hasFile('imagens')) {
            foreach ($request->file('imagens') as $file) {
                // Generate a unique file name and save it to the public directory
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('imgs/photos', $fileName, 'public');

                // Save the image path to the database
                Imagem::create([
                    'imovel_id' => $imovel->id,
                    'caminho_imagem' => $filePath,
                ]);
            }
        }

        // Redirect to the list of imoveis with a success message
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
