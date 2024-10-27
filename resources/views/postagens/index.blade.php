@extends('layout')

@section('content')
    <h1 class="text-2xl font-semibold text-gray-900 mb-6 text-center">Lista de Postagens</h1>

    <a href="{{ route('postagens.create') }}" 
       class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-md mb-4 inline-block">
        Nova Postagem
    </a>

    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-4xl">
            @if ($postagens->isEmpty())
                <p class="text-gray-500 text-center">Nenhuma postagem encontrada.</p>
            @else
                <ul>
                    @foreach ($postagens as $postagem)
                        <li class="rounded-xl border p-5 shadow-md mb-6 bg-white">
                            <div class="flex w-full items-center justify-between border-b pb-3">
                                <div class="flex items-center space-x-3">
                                    <div class="h-8 w-8 rounded-full bg-slate-400 bg-[url('https://i.pravatar.cc/32')]"></div>
                                    <div class="text-lg font-bold text-slate-700">{{ $postagem->usuario->nome ?? 'Usuário Desconhecido' }}</div>
                                </div>
                                <div class="flex items-center space-x-8">
                                    <button class="rounded-2xl border bg-neutral-100 px-3 py-1 text-xs font-semibold">{{ $postagem->categoria->nome }}</button>
                                    <div class="text-xs text-neutral-500">{{ $postagem->created_at->diffForHumans() }}</div>
                                </div>
                            </div>

                            <div class="mt-4 mb-6">
                                <div class="mb-3 text-xl font-bold">{{ $postagem->titulo }}</div>
                                <div class="text-sm text-neutral-600">{{ $postagem->descricao }}</div>
                                <div class="text-xs text-gray-500">Disponível a partir de: {{  \Carbon\Carbon::parse($postagem->disponivel_a_partir)->format('d/m/Y')}}</div> <!-- Atualizado para usar o campo correto -->
                            </div>

                            <div>
                                @if ($postagem->fotos->isNotEmpty())
                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                        @foreach ($postagem->fotos as $foto)
                                            <img src="{{ $foto->caminho }}" 
                                                 alt="Foto da postagem" 
                                                 class="w-full h-64 object-cover rounded-md">
                                        @endforeach
                                    </div>
                                @else
                                    <p class="text-gray-500 mt-2 text-center">Nenhuma foto disponível.</p>
                                @endif
                            </div>

                            <div class="flex justify-between mt-4 text-slate-500">
                                <div class="flex space-x-4 md:space-x-8">
                                    <div class="flex cursor-pointer items-center transition hover:text-slate-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-1.5 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                        </svg>
                                        <span>{{ $postagem->visualizacoes ?? 0 }}</span> <!-- Exibe o número de visualizações -->
                                    </div>
                                    <div class="flex cursor-pointer items-center transition hover:text-slate-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-1.5 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                                        </svg>
                                        <span>{{ $postagem->curtidas ?? 0 }}</span> <!-- Exibe o número de curtidas -->
                                    </div>
                                </div>

                                <div class="flex items-center">
                                    <a href="{{ route('postagens.edit', $postagem->id) }}" class="text-indigo-600 hover:underline mr-4">Editar</a>
                                    <form action="{{ route('postagens.destroy', $postagem->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline"
                                                onclick="return confirm('Tem certeza que deseja excluir esta postagem?')">
                                            Excluir
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@endsection
