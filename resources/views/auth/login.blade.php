<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
<body>
    <h1 class="mt-6 text-2xl font-semibold text-gray-900 mb-6">Tem Vaga</h1>
    <h1 class="mt-6 text-2xl font-semibold text-gray-900 mb-6">Login</h1>
    <form action="{{ route('login') }}" method="POST" class="bg-white p-6 rounded-lg shadow-lg">
        @csrf

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                <input type="email" name="email" id="email" required
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        </div>
        
        <div class="mb-4">
            <label for="senha" class="block text-sm font-medium text-gray-700">Senha</label>
            <input type="password" name="senha" id="senha" required
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                
                <button type="submit" 
                class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-md">
            Entrar
        </button>
    </form>
    
    <a href="{{ route('usuarios.create') }}" class="mt-4 inline-block text-indigo-600 hover:underline">Não tem uma conta? Cadastre-se</a>
</body>    
</html>
