<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;



class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); 
    }

    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'senha' => ['required'],
    ]);

    // Encontrar o usuário pelo e-mail
    $usuario = Usuario::where('email', $credentials['email'])->first();

    // Verificar se o usuário existe e se a senha está correta
    if ($usuario && Hash::check($credentials['senha'], $usuario->senha)) {
        Auth::login($usuario); // Realiza o login do usuário
        $request->session()->regenerate(); // Regenera a sessão por segurança

        return redirect()->intended('postagens');
    }

    // Retorna erro se as credenciais forem inválidas
    return back()->withErrors([
        'email' => 'As credenciais fornecidas estão incorretas.',
    ]);
}

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }
}


