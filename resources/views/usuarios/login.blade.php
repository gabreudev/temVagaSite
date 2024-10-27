@extends('layout')

@section('content')
    <h1 class="text-2xl font-semibold text-gray-900 mb-6">Login</h1>

    <form action="{{ route('login') }}" method="POST" class="bg-white p-6 rounded-lg shadow-lg">
        @csrf

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
            <input type="email" name="email" id="email" required
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div class="mb-4">
            <label for="senha" class="block text-sm font-medium text-gray-700">Senha</label>
            <input type="password" name="senha" id="senha" required
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <button type="submit" 
                class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-md">
            Entrar
        </button>
    </form>

    <a href="{{ route('usuarios.create') }}" class="mt-4 inline-block text-indigo-600 hover:underline">Não tem uma conta? Cadastre-se</a>
@endsection
