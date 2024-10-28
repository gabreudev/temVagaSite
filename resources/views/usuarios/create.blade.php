@extends('layout')

@section('content')
    <h1 class="text-2xl font-semibold text-gray-900 mb-6">Cadastrar Usuário</h1>

    <form action="{{ route('usuarios.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-lg">
        @csrf

        <div class="mb-4">
            <label for="nome" class="block text-sm font-medium text-gray-700">Nome</label>
            <input type="text" name="nome" id="nome" required
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        </div>

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

        <div class="mb-4">
            <label for="senha_confirmation" class="block text-sm font-medium text-gray-700">Confirme a Senha</label>
            <input type="password" name="senha_confirmation" id="senha_confirmation" required
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <!-- Campo de Descrição -->
        <div class="mb-4">
            <label for="descricao" class="block text-sm font-medium text-gray-700">Descrição</label>
            <textarea name="descricao" id="descricao" rows="3" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
         </div>

        <!-- Campo de Número de Contato -->
        <div class="mb-4">
            <label for="telefone" class="block text-sm font-medium text-gray-700">Número de Contato</label>
            <input type="text" name="telefone" id="telefone" required
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <button type="submit" 
                class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-md">
            Cadastrar
        </button>
    </form>

    <a href="{{ route('login') }}" class="mt-4 inline-block text-indigo-600 hover:underline">Já tem uma conta? Faça Login</a>
@endsection
