@extends('layout')

@section('content')
    <h1>Lista de Usuários</h1>
    <a href="{{ route('usuarios.create') }}">Criar Novo Usuário</a>
    <ul>
        @foreach ($usuarios as $usuario)
            <li>
                {{ $usuario->nome }} - {{ $usuario->email }}
                <a href="{{ route('usuarios.edit', $usuario->id) }}">Editar</a>
                <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Excluir</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
