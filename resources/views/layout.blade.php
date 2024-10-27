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
    <div class="container mx-auto px-6 mt-16">
        <header class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-semibold text-gray-900">TemVaga</h1>
            <nav>
                <a href="{{ route('postagens.index') }}" class="mr-4 text-gray-600 hover:text-gray-900">Postagens</a>
                <a href="{{ route('categorias.index') }}" class="text-gray-600 hover:text-gray-900">Categorias</a>
            </nav>
        </header>

        <main>
            @yield('content')
        </main>

        <footer class="mt-16 text-center text-sm text-gray-500">
            © 2024 TemnVaga. Todos os direitos reservados.
        </footer>
    </div>
</body>
</html>
