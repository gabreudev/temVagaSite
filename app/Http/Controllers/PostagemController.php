<?php

namespace App\Http\Controllers;

use App\Models\Postagem;
use App\Models\Categoria;
use App\Models\Foto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostagemController extends Controller
{
    public function index()
    {
        $postagens = Postagem::with('fotos')->get();
        return view('postagens.index', compact('postagens'));
    }

    public function create()
    {
        $categorias = Categoria::all(); // Carrega todas as categorias
        return view('postagens.create', compact('categorias')); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:150',
            'descricao' => 'required',
            'preco' => 'required|numeric',
            'disponivel_a_partir' => 'required|date',
            'usuario_id' => 'required|exists:usuarios,id',
            'fotos.*' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $postagem = Postagem::create($request->only([
            'titulo', 'descricao', 'preco', 'disponivel_a_partir', 'usuario_id'
        ]));

        if ($request->hasFile('fotos')) {
            foreach ($request->file('fotos') as $foto) {
                $caminho = $foto->store('public/fotos'); // Armazena no diretório 'storage/app/public/fotos'

                Foto::create([
                    'caminho' => $caminho,
                    'postagem_id' => $postagem->id
                ]);
            }
        }
        return redirect()->route('postagens.index')
                         ->with('success', 'Postagem criada com sucesso!');
    }

    public function show($id)
    {
        $postagem = Postagem::with('fotos')->findOrFail($id);
        return view('postagens.show', compact('postagem'));
    }

    public function edit($id)
    {
        $postagem = Postagem::findOrFail($id);
        return view('postagens.edit', compact('postagem'));
    }

    public function update(Request $request, $id)
    {
        $postagem = Postagem::findOrFail($id);

        $request->validate([
            'titulo' => 'required|max:150',
            'descricao' => 'required',
            'preco' => 'required|numeric',
            'disponivel_a_partir' => 'required|date',
            'fotos.*' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $postagem->update($request->only(['titulo', 'descricao', 'preco', 'disponivel_a_partir']));

        if ($request->hasFile('fotos')) {
            foreach ($request->file('fotos') as $foto) {
                $caminho = $foto->store('public/fotos');

                Foto::create([
                    'caminho' => $caminho,
                    'postagem_id' => $postagem->id
                ]);
            }
        }

        return redirect()->route('postagens.index')
                         ->with('success', 'Postagem atualizada com sucesso!');
    }


    public function destroy($id)
    {
        $postagem = Postagem::findOrFail($id);

        foreach ($postagem->fotos as $foto) {
            Storage::delete($foto->caminho);
            $foto->delete();
        }

        $postagem->delete();

        return redirect()->route('postagens.index')
                         ->with('success', 'Postagem excluída com sucesso!');
    }
}
