<li class="rounded-xl border p-5 shadow-md mb-6 bg-white">
    <div class="flex w-full items-center justify-between border-b pb-3">
        <div class="flex items-center space-x-3">
            <div class="h-8 w-8 rounded-full bg-slate-400">
                <img src="{{ $postagem->usuario->foto ?? 'https://i.pravatar.cc/32' }}" 
                     alt="Foto de {{ $postagem->usuario->nome ?? 'Usuário Desconhecido' }}" 
                     class="h-8 w-8 rounded-full object-cover">
            </div>
            <a href="{{ route('usuarios.show', $postagem->usuario->id) }}" 
               class="text-lg font-bold text-slate-700 hover:underline">
                {{ $postagem->usuario->nome ?? 'Usuário Desconhecido' }}
            </a>
        </div>
        <div class="flex items-center space-x-8">
            <button class="rounded-2xl border bg-neutral-100 px-3 py-1 text-xs font-semibold">
                {{ $postagem->categoria->nome }}
            </button>
            <div class="flex items-center text-xs text-neutral-500">
                <span class="mr-4">{{ $postagem->created_at->diffForHumans() }}</span>
                <form action="{{ route('denuncias.store') }}" method="POST" class="inline">
                    @csrf
                    <input type="hidden" name="postagem_id" value="{{ $postagem->id }}">
                    <button type="submit" class="ml-1 text-yellow-500 hover:text-yellow-600"
                            onclick="return confirm('Tem certeza que deseja denunciar esta postagem?')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 2L2 22h20L12 2z"/>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="mt-4 mb-6">
        <div class="mb-3 text-xl font-bold">{{ $postagem->titulo }}</div>
        <div class="text-sm text-neutral-600">{{ $postagem->descricao }}</div>
        <div class="text-xs text-gray-500">
            Disponível a partir de: {{ \Carbon\Carbon::parse($postagem->disponivel_a_partir)->format('d/m/Y') }}
        </div>
    </div>

    <div>
        @if ($postagem->fotos->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($postagem->fotos as $foto)
                    <img src="{{ $foto->caminho }}" alt="Foto da postagem"
                         class="w-full h-64 object-cover rounded-md">
                @endforeach
            </div>
        @else
            <p class="text-gray-500 mt-2 text-center">Nenhuma foto disponível.</p>
        @endif
    </div>
</li>
