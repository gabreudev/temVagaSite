@extends('layout')

@section('content')
    <h1>Criar Nova Postagem</h1>
    <form action="{{ route('postagens.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Título:</label>
        <input type="text" name="titulo" required><br>

        <label>Descrição:</label>
        <textarea name="descricao" required></textarea><br>

        <label>Preço:</label>
        <input type="number" name="preco" step="0.01" required><br>

        <label>Disponível a partir de:</label>
        <input type="date" name="disponivel_a_partir" required><br>

        <label>Categoria:</label>
        <select name="categoria_id" required>
            <option value="">Selecione</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
            @endforeach
        </select><br>

        <label>Fotos:</label>
        <input type="file" name="fotos[]" multiple><br>

        <button type="submit">Salvar</button>
    </form>
@endsection
