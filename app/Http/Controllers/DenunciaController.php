<?php

namespace App\Http\Controllers;

use App\Models\Denuncia;
use App\Models\Postagem;
use Illuminate\Http\Request;

class DenunciaController extends Controller
{
    /**
     * Exibe a lista de denúncias.
     */
    public function index()
    {
        $denuncias = Denuncia::with(['usuario', 'postagem'])->get();
        return view('denuncias.index', compact('denuncias'));
    }

    /**
     * Armazena uma nova denúncia no banco de dados.
     */
    public function store(Request $request)
    {
        $request->validate([
            'postagem_id' => 'required|exists:postagens,id',
        ]);

        Denuncia::create([
            'usuario_id' => auth()->id(),  
            'postagem_id' => $request->postagem_id,
            'data_denuncia' => now(),
        ]);

        return redirect()->back()->with('success', 'Denúncia registrada com sucesso!');
    }

    /**
     * Exibe uma denúncia específica.
     */
    public function show($id)
    {
        $denuncia = Denuncia::with(['usuario', 'postagem'])->findOrFail($id);
        return view('denuncias.show', compact('denuncia'));
    }

    /**
     * Remove uma denúncia.
     */
    public function destroy($id)
    {
        $denuncia = Denuncia::findOrFail($id);
        $denuncia->delete();

        return redirect()->route('denuncias.index')->with('success', 'Denúncia excluída com sucesso!');
    }
}
