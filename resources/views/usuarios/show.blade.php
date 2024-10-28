@extends('layout')

@section('content')
<body class="bg-gray-100">
    <div class="max-w-4xl mx-auto my-10">
        <!-- Cartão do Perfil -->
        <div class="bg-white rounded-lg shadow-md p-5 w-full">
            <img class="w-32 h-32 rounded-full mx-auto" src="{{ $usuario->foto_perfil ?? 'https://picsum.photos/200' }}" alt="Profile picture">
            <h2 class="text-center text-2xl font-semibold mt-3">{{ $usuario->nome }}</h2>
            <div class="flex justify-center mt-5">
                <p class="text-blue-500 hover:text-blue-700 mx-3">{{ $usuario->telefone }}</p>
            </div>
            <div class="mt-5">
                <h3 class="text-xl font-semibold">Bio</h3>
                <p class="text-gray-600 mt-2">{{ $usuario->descricao ?? 'Bio não disponível' }}</p>
            </div>
        </div>

        <!-- Seção de Postagens do Usuário -->
        <div class="mt-10">
            <h3 class="text-xl font-semibold mb-4">Anúncios do Usuário</h3>

            @if ($usuario->postagens->isEmpty())
                <p class="text-gray-500 mt-2">Nenhuma postagem encontrada para este usuário.</p>
            @else
                <ul>
                    @foreach ($usuario->postagens as $postagem)
                        @include('partials._postagem', ['postagem' => $postagem])
                    @endforeach
                </ul>
            @endif
        </div>
    @endsection
