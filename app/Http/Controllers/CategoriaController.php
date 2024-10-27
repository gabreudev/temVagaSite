<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nome' => 'required|unique:categorias|max:50']);

        Categoria::create($request->only('nome'));

        return redirect()->route('categorias.index')
                         ->with('success', 'Categoria criada com sucesso!');
    }

    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, $id)
    {
        $categoria = Categoria::findOrFail($id);

        $request->validate(['nome' => 'required|unique:categorias,nome,' . $id]);

        $categoria->update($request->only('nome'));

        return redirect()->route('categorias.index')
                         ->with('success', 'Categoria atualizada com sucesso!');
    }

    public function destroy($id)
    {
        Categoria::findOrFail($id)->delete();

        return redirect()->route('categorias.index')
                         ->with('success', 'Categoria excluída com sucesso!');
    }
}
