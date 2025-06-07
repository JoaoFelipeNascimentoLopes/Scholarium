<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/js/app.js'])
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" href="{{ asset('images/page_Icon.png') }}" type="image/png">
    <title>Sucesso - Scholarium</title>
    <style>
        .poppins-thin {
            font-family: "Poppins", sans-serif;
            font-weight: 100;
            font-style: normal;
        }

        .poppins-extralight {
            font-family: "Poppins", sans-serif;
            font-weight: 200;
            font-style: normal;
        }

        .poppins-light {
            font-family: "Poppins", sans-serif;
            font-weight: 300;
            font-style: normal;
        }

        .poppins-regular {
            font-family: "Poppins", sans-serif;
            font-weight: 400;
            font-style: normal;
        }

        .poppins-medium {
            font-family: "Poppins", sans-serif;
            font-weight: 500;
            font-style: normal;
        }

        .poppins-semibold {
            font-family: "Poppins", sans-serif;
            font-weight: 600;
            font-style: normal;
        }

        .poppins-bold {
            font-family: "Poppins", sans-serif;
            font-weight: 700;
            font-style: normal;
        }

        .poppins-extrabold {
            font-family: "Poppins", sans-serif;
            font-weight: 800;
            font-style: normal;
        }

        .poppins-black {
            font-family: "Poppins", sans-serif;
            font-weight: 900;
            font-style: normal;
        }

        .poppins-thin-italic {
            font-family: "Poppins", sans-serif;
            font-weight: 100;
            font-style: italic;
        }

        .poppins-extralight-italic {
            font-family: "Poppins", sans-serif;
            font-weight: 200;
            font-style: italic;
        }

        .poppins-light-italic {
            font-family: "Poppins", sans-serif;
            font-weight: 300;
            font-style: italic;
        }

        .poppins-regular-italic {
            font-family: "Poppins", sans-serif;
            font-weight: 400;
            font-style: italic;
        }

        .poppins-medium-italic {
            font-family: "Poppins", sans-serif;
            font-weight: 500;
            font-style: italic;
        }

        .poppins-semibold-italic {
            font-family: "Poppins", sans-serif;
            font-weight: 600;
            font-style: italic;
        }

        .poppins-bold-italic {
            font-family: "Poppins", sans-serif;
            font-weight: 700;
            font-style: italic;
        }

        .poppins-extrabold-italic {
            font-family: "Poppins", sans-serif;
            font-weight: 800;
            font-style: italic;
        }

        .poppins-black-italic {
            font-family: "Poppins", sans-serif;
            font-weight: 900;
            font-style: italic;
        }
    </style>
</head>

<body class="flex items-center justify-center min-h-screen poppins-regular ">
    <div class="block shadow-md hover:shadow-lg transition inset-shadow-sm inset-shadow-gray-400/90 rounded-xl">
        <br>
        <div class="flex justify-center items-center">
            <img src="{{ asset('images/page_Icon.png') }}" alt="Logo" class="w-64 h-64 ml-percent-10">
        </div>
        <div class="bg-white p-8 rounded-lg shadow-lg text-center max-w-md w-full poppins-regular">
            <!-- Ícone de sucesso -->
            <div class="flex justify-center">
                <svg class="w-16 h-16 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>

            <!-- Título -->
            <h1 class="text-2xl font-bold text-gray-800 mt-4 poppins-bold">Cadastro Realizado com Sucesso!</h1>

            <!-- Mensagem -->
            <p class="text-gray-600 mt-2 poppins-regular">A Instituição foi cadastrada com sucesso no sistema.</p>

            <!-- Botões de ação -->
            <div class="mt-6 space-y-4">
                <a href="{{ route('instituicao.create') }}"
                    class="inline-block w-full px-4 py-2 bg-[#272727] text-white rounded-lg hover:bg-gray-500 transition duration-300 poppins-regular">
                    <i class="bi bi-cloud-plus"></i> Cadastrar outra Instituição
                </a>
                <a href="{{ route('login') }}"
                    class="inline-block w-full px-4 py-2 bg-[#272727] text-white rounded-lg hover:bg-gray-500 transition duration-300 poppins-regular">
                    <i class="bi bi-box-arrow-in-right"></i> Realizar Login
                </a>
                <a href="/"
                    class="inline-block w-full px-4 py-2 bg-[#272727] text-white rounded-lg hover:bg-gray-500 transition duration-300 poppins-regular">
                    <i class="bi bi-arrow-return-left"></i> Voltar à página inicial
                </a>
            </div>
        </div>
    </div>
</body>
</html>
