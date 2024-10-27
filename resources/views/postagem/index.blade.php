@extends('layout')

@section('content')
    <h1>Postagens</h1>
    <a href="{{ route('postagens.create') }}">Nova Postagem</a>

    <ul>
        @foreach ($postagens as $postagem)
            <li>
                <h2>{{ $postagem->titulo }}</h2>
                <p>{{ $postagem->descricao }}</p>
                <p>Preço: R$ {{ $postagem->preco }}</p>
                <a href="{{ route('postagens.show', $postagem->id) }}">Ver detalhes</a>
                <a href="{{ route('postagens.edit', $postagem->id) }}">Editar</a>
                <form action="{{ route('postagens.destroy', $postagem->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Excluir</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
