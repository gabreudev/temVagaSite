<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TemVaga</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Tailwind CSS v3.2.4 */
        *,::after,::before{box-sizing:border-box;border-width:0;border-style:solid;border-color:#e5e7eb}
        ::after,::before{--tw-content:''}
        html{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;font-family:Figtree, sans-serif;font-feature-settings:normal}
        body{margin:0;line-height:inherit}
        /* ... (Resto do CSS fornecido acima) ... */
    </style>
</head>
<body class="bg-gray-100 min-h-screen antialiased">
    <div class="container mx-auto px-3 mt-8">
        <header class="flex justify-between items-center mb-2 border-b border-gray-300 pb-6"> 
            <h1 class="text-3xl font-semibold text-gray-900">TemVaga</h1>
            <nav>
            <a href="{{ route('postagens.index') }}" 
            class="mr-4 text-gray-900 border-b-4 {{ request()->routeIs('postagens.index') ? 'border-green-300' : 'border-transparent' }} hover:border-green-300">Home</a>

            <a href="{{ route('usuarios.index') }}" 
            class="mr-4 text-gray-900 border-b-4 {{ request()->routeIs('usuarios.index') ? 'border-green-300' : 'border-transparent' }} hover:border-green-300">Sobre</a>

                @if(Auth::check()) <!-- Verifica se o usuário está logado -->
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-md mb-4 inline-block">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-md mb-4 inline-block">Login</a>
            @endif

            </nav>
        </header>
        <main>
            @yield('content')
        </main>

        <footer class="mt-16 text-center text-sm text-gray-500">
            © 2024 TemVaga. Todos os direitos reservados.
        </footer>
    </div>
</body>
</html>
