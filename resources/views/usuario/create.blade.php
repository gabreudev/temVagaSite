@extends('layout')

@section('content')
    <h1>Criar Novo Usuário</h1>
    <form action="{{ route('usuarios.store') }}" method="POST">
        @csrf
        <label>Nome:</label>
        <input type="text" name="nome" required><br>

        <label>Email:</label>
        <input type="email" name="email" required><br>

        <label>Senha:</label>
        <input type="password" name="senha" required><br>

        <label>Telefone:</label>
        <input type="text" name="telefone"><br>

        <button type="submit">Salvar</button>
    </form>
@endsection
