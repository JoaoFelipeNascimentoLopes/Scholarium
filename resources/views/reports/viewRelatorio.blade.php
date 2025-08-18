<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $titulo ?? 'Visualizador de Relatório' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        /* Garante que o corpo e o html ocupem 100% da altura e remove margens */
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden; /* Evita barras de rolagem duplas */
            font-family: sans-serif;
        }
        /* Container principal que organiza a barra e o PDF */
        .viewer-container {
            display: flex;
            flex-direction: column;
            height: 100vh; /* Ocupa a altura inteira da tela */
        }
        /* A barra de ferramentas no topo */
        .toolbar {
            flex-shrink: 0; /* Impede que a barra encolha */
        }
        /* O container do PDF que ocupa todo o espaço restante */
        .pdf-frame {
            flex-grow: 1; /* Faz o container do PDF crescer para ocupar o espaço */
            border: none; /* Remove bordas do iframe */
        }
    </style>
</head>
<body class="bg-gray-300">

<div class="viewer-container">
    <!-- Barra de Ferramentas (Menu Bar) -->
    <div class="toolbar bg-[#272727] text-white p-3 shadow-lg flex justify-between items-center">
        <h1 class="text-lg font-semibold">
            <i class="bi bi-file-earmark-pdf-fill"></i>
            {{ $titulo ?? 'Relatório' }}
        </h1>
        <div class="flex items-center gap-4">
            <!-- Botão de Voltar (Corrigido) -->
            <a href="{{ $returnUrl ?? url()->previous() }}"
               class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg transition-colors flex items-center gap-2"
               title="Fechar Relatório">
                <i class="bi bi-x-circle-fill"></i>
                Fechar
            </a>
        </div>
    </div>

    <!-- Iframe para exibir o PDF embutido -->
    <iframe
        class="pdf-frame"
        src="data:application/pdf;base64,{{ $pdfBase64 }}"
        type="application/pdf"
        title="{{ $titulo ?? 'Visualizador de PDF' }}">
    </iframe>
</div>

</body>
</html>
