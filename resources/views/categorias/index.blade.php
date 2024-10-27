@extends('layout')

@section('content')
    <h1 class="text-2xl font-semibold text-gray-900 mb-6">Lista de Categorias</h1>

    <a href="{{ route('categorias.create') }}" 
       class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-md mb-4 inline-block">
        Nova Categoria
    </a>

    <ul class="bg-white p-6 rounded-lg shadow-lg">
        @foreach ($categorias as $categoria)
            <li class="flex justify-between items-center mb-2">
                <span>{{ $categoria->nome }}</span>
                <div>
                    <a href="{{ route('categorias.edit', $categoria->id) }}" 
                       class="text-indigo-600 hover:underline mr-4">Editar</a>
                    <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline"
                                onclick="return confirm('Tem certeza que deseja excluir esta categoria?')">
                            Excluir
                        </button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
@endsection
