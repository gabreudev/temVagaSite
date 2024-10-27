@extends('layout')

@section('content')
    <h1 class="text-2xl font-semibold text-gray-900 mb-6">Lista de Postagens</h1>

    <a href="{{ route('postagens.create') }}" 
       class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-md mb-4 inline-block">
        Nova Postagem
    </a>

    <div class="bg-white p-6 rounded-lg shadow-lg">
        @if ($postagens->isEmpty())
            <p class="text-gray-500">Nenhuma postagem encontrada.</p>
        @else
            <ul>
                @foreach ($postagens as $postagem)
                    <li class="flex justify-between items-center mb-4 border-b pb-2">
                        <div>
                            <h2 class="text-xl font-semibold text-gray-900">{{ $postagem->titulo }}</h2>
                            <p class="text-gray-600">{{ $postagem->descricao }}</p>
                            <p class="text-gray-500">Preço: R$ {{ $postagem->preco }}</p>
                            <p class="text-sm text-gray-500">Categoria: {{ $postagem->categoria->nome }}</p>
                        </div>
                        <div class="flex items-center">
                            <a href="{{ route('postagens.edit', $postagem->id) }}" 
                               class="text-indigo-600 hover:underline mr-4">Editar</a>
                            <form action="{{ route('postagens.destroy', $postagem->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline"
                                        onclick="return confirm('Tem certeza que deseja excluir esta postagem?')">
                                    Excluir
                                </button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    <a href="{{ route('categorias.index') }}" class="mt-4 inline-block text-indigo-600 hover:underline">Ver Categorias</a>
@endsection
