<?php

namespace App\Http\Controllers;

use App\Models\Imovel;
use Illuminate\Http\Request;

class ImovelController extends Controller
{
    /**
     * Display a listing of the imoveis.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetch all imoveis from the database
        $imoveis = Imovel::all();

        // Pass the imoveis to the view
        return view('imoveis', compact('imoveis'));
    }

    /**
     * Display the specified imovel.
     *
     * @param \App\Models\Imovel $imovel
     * @return \Illuminate\Http\Response
     */
    public function show(Imovel $imovel)
    {
        // Pass the specific imovel to the view
        return view('imoveis.show', compact('imovel'));
    }

    /**
     * Show the form for creating a new imovel.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('imoveis.create');
    }

    /**
     * Store a newly created imovel in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate and create the imovel
        $validatedData = $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'tipo_imovel' => 'required|in:Casa,Apartamento,Comercial,Terreno',
            'categorias' => 'required|json',
            'valor' => 'nullable|numeric|min:0',
            'corretor_id' => 'required|exists:corretores,id',
        ]);

        // Create a new Imovel instance and save it to the database
        Imovel::create($validatedData);

        // Redirect to the list of imoveis with a success message
        return redirect()->route('imoveis.index')->with('success', 'Imóvel criado com sucesso!');
    }

    /**
     * Show the form for editing the specified imovel.
     *
     * @param \App\Models\Imovel $imovel
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Imovel $imovel)
    {
        // Validate and update the imovel
        $validatedData = $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'tipo_imovel' => 'required|in:Casa,Apartamento,Comercial,Terreno',
            'categorias' => 'required|json',
            'valor' => 'nullable|numeric|min:0',
            'corretor_id' => 'required|exists:corretores,id',
        ]);

        // Update the imovel with the validated data
        $imovel->update($validatedData);

        // Redirect to the list of imoveis with a success message
        return redirect()->route('imoveis.index')->with('success', 'Imóvel atualizado com sucesso!');
    }

    /**
     * Remove the specified imovel from storage.
     *
     * @param \App\Models\Imovel $imovel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Imovel $imovel)
    {
        // Delete the imovel
        $imovel->delete();

        // Redirect to the list of imoveis with a success message
        return redirect()->route('imoveis.index')->with('success', 'Imóvel deletado com sucesso!');
    }
}
