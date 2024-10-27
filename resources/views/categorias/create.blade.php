@extends('layout')

@section('content')
    <h1>Criar Nova Categoria</h1>

    <form action="{{ route('categorias.store') }}" method="POST">
        @csrf
        <label>Nome da Categoria:</label>
        <input type="text" name="nome" required><br><br>

        <button type="submit">Salvar</button>
    </form>

    <a href="{{ route('categorias.index') }}">Voltar para Lista de Categorias</a>
@endsection
