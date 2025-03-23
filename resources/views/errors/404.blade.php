<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Não Encontrada - 404</title>
    <link rel="icon" href="{{ asset('images/page_Icon.png') }}" type="image/png">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="min-h-screen flex flex-col items-center justify-center text-[#272727]">
        <div class="text-center">
            <!-- Ícone ou Logo -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 mx-auto mb-6 text-[#272727]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>

            <!-- Título -->
            <h1 class="text-6xl font-bold mb-4">404</h1>
            <h2 class="text-2xl font-semibold mb-8">Página Não Encontrada</h2>

            <!-- Mensagem -->
            <p class="text-lg mb-8">
                Oops! Parece que a página que você está procurando não existe ou foi movida.
            </p>

            <!-- Botão para Voltar -->
            <a href="/" class="inline-block bg-[#272727] text-white font-semibold py-3 px-6 rounded-lg shadow-lg hover:bg-gray-700 transition duration-300">
                Voltar para a Página Inicial
            </a>
        </div>
    </div>
</body>
</html>