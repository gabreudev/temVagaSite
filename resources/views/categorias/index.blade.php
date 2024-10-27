@extends('layout')

@section('content')
    <h1>Lista de Categorias</h1>

    <a href="{{ route('categorias.create') }}">Nova Categoria</a>

    <ul>
        @foreach ($categorias as $categoria)
            <li>
                {{ $categoria->nome }}

                <a href="{{ route('categorias.edit', $categoria->id) }}">Editar</a>

                <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Tem certeza que deseja excluir esta categoria?')">Excluir</button>
                </form>
            </li>
        @endforeach
    </ul>

    <a href="{{ route('postagens.index') }}">Voltar para Postagens</a>
@endsection
