@extends('layout')

@section('content')
    <h1 class="text-2xl font-semibold text-gray-900 mb-6">Criar Nova Categoria</h1>

    <form action="{{ route('categorias.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-lg">
        @csrf
        <div class="mb-4">
            <label for="nome" class="block text-sm font-medium text-gray-700">Nome da Categoria</label>
            <input type="text" name="nome" id="nome" required 
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <button type="submit" 
                class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-md">
            Salvar
        </button>
    </form>

    <a href="{{ route('categorias.index') }}" class="mt-4 inline-block text-indigo-600 hover:underline">Voltar para Categorias</a>
@endsection
