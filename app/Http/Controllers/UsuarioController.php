<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UsuarioController extends Controller
{

    public function show($id)
    {
        $usuario = Usuario::with('postagens')->findOrFail($id);
        return view('usuarios.show', compact('usuario'));
    }
    /**
     * Exibir uma lista de usuários.
     */
    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Mostrar o formulário para criar um novo usuário.
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Salvar um novo usuário.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:100',
            'email' => 'required|email|unique:usuarios,email',
            'senha' => 'required|min:3',
            'telefone' => 'required|max:20',
            'descricao' => 'required|max:255',
        ]);

        $usuario = Usuario::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'senha' => Hash::make($request->senha),
            'telefone' => $request->telefone,
            'banido' => false,
            'descricao' => $request->descricao,
        ]);

        Auth::login($usuario);

        return redirect()->route('postagens.index')
                         ->with('success', 'Usuário criado com sucesso!');
    }

    /**
     * Mostrar o formulário de edição de um usuário.
     */
    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.edit', compact('usuario'));
    }

    /**
     * Atualizar um usuário existente.
     */
    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);

        $request->validate([
            'nome' => 'required|max:100',
            'email' => 'required|email|unique:usuarios,email,' . $id,
            'telefone' => 'nullable|max:20',
        ]);

        $usuario->update($request->only(['nome', 'email', 'telefone']));

        return redirect()->route('usuarios.index')
                         ->with('success', 'Usuário atualizado com sucesso!');
    }

    /**
     * Excluir um usuário.
     */
    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return redirect()->route('usuarios.index')
                         ->with('success', 'Usuário excluído com sucesso!');
    }
}
