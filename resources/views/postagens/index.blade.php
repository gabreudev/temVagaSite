@extends('layout')

@section('content')
<h1 class="text-2xl font-semibold text-gray-900 mb-6 text-center">Lista de Postagens</h1>

<a href="{{ route('postagens.create') }}" 
   class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-md mb-4 inline-block">
    Anunciar Vaga
</a>

<div class="flex items-center justify-center">
    <div class="w-full max-w-4xl">
        @if ($postagens->isEmpty())
            <p class="text-gray-500 text-center">Nenhuma postagem encontrada.</p>
        @else
            <ul>
                @foreach ($postagens as $postagem)
                    @include('partials._postagem', ['postagem' => $postagem])
                @endforeach
            </ul>
        @endif
    </div>
</div>
@endsection
