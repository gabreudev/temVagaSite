@extends('layout')

@section('content')
    <h1 class="text-2xl font-semibold text-gray-900 mb-6">Criar Nova Postagem</h1>

    <form action="{{ route('postagens.store') }}" method="POST" enctype="multipart/form-data" 
          class="bg-white p-6 rounded-lg shadow-lg">
        @csrf

        <div class="mb-4">
            <label for="titulo" class="block text-sm font-medium text-gray-700">Título</label>
            <input type="text" name="titulo" id="titulo" required
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div class="mb-4">
            <label for="descricao" class="block text-sm font-medium text-gray-700">Descrição</label>
            <textarea name="descricao" id="descricao" rows="4" required
                      class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
        </div>

        <div class="mb-4">
            <label for="preco" class="block text-sm font-medium text-gray-700">Preço (R$)</label>
            <input type="number" name="preco" id="preco" step="0.01" required
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div class="mb-4">
            <label for="disponivel_a_partir" class="block text-sm font-medium text-gray-700">Disponível a partir de</label>
            <input type="date" name="disponivel_a_partir" id="disponivel_a_partir" required
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div class="mb-4">
            <label for="categoria_id" class="block text-sm font-medium text-gray-700">Categoria</label>
            <select name="categoria_id" id="categoria_id" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                <option value="">Selecione</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="fotos" class="block text-sm font-medium text-gray-700">Fotos</label>
            <input type="file" name="fotos[]" id="fotos" multiple
                   class="mt-1 block w-full text-sm text-gray-500 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <button type="submit" 
                class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-md">
            Salvar
        </button>
    </form>

    <a href="{{ route('postagens.index') }}" class="mt-4 inline-block text-indigo-600 hover:underline">Voltar para Postagens</a>
@endsection
