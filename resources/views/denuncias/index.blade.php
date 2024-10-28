@extends('layout')

@section('content')
    <h1 class="text-2xl font-semibold mb-6 text-center mt-9">Denúncias</h1>

    @if ($denuncias->isEmpty())
        <p class="text-gray-500 text-center">Nenhuma denúncia registrada.</p>
    @else
        <ul>
            @foreach ($denuncias as $denuncia)
                <li class="border p-4 mb-4 rounded">
                    <p><strong>Postagem:</strong> {{ $denuncia->postagem->titulo }}</p>
                    <p><strong>Usuário:</strong> {{ $denuncia->usuario->nome }}</p>
                    <p><strong>Data:</strong> {{ $denuncia->data_denuncia }}</p>
                    <form action="{{ route('denuncias.destroy', $denuncia->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline mt-2">Excluir</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
