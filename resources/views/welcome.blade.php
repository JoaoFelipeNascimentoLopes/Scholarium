<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Adiciona Arquivos CSS e JS Externos com o Vite -->
    @vite(['resources/js/app.js'])
    <link rel="icon" href="{{ asset('images/page_Icon.png') }}" type="image/png">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <title>Scholarium - Gestão Escolar</title>
    <!-- Fontes -->
    <style>
        .poppins-thin {
            font-family: "Poppins", serif;
            font-weight: 100;
            font-style: normal;
        }

        .poppins-extralight {
            font-family: "Poppins", serif;
            font-weight: 200;
            font-style: normal;
        }

        .poppins-light {
            font-family: "Poppins", serif;
            font-weight: 300;
            font-style: normal;
        }

        .poppins-regular {
            font-family: "Poppins", serif;
            font-weight: 400;
            font-style: normal;
        }

        .poppins-medium {
            font-family: "Poppins", serif;
            font-weight: 500;
            font-style: normal;
        }

        .poppins-semibold {
            font-family: "Poppins", serif;
            font-weight: 600;
            font-style: normal;
        }

        .poppins-bold {
            font-family: "Poppins", serif;
            font-weight: 700;
            font-style: normal;
        }

        .poppins-extrabold {
            font-family: "Poppins", serif;
            font-weight: 800;
            font-style: normal;
        }

        .poppins-black {
            font-family: "Poppins", serif;
            font-weight: 900;
            font-style: normal;
        }

        .poppins-thin-italic {
            font-family: "Poppins", serif;
            font-weight: 100;
            font-style: italic;
        }

        .poppins-extralight-italic {
            font-family: "Poppins", serif;
            font-weight: 200;
            font-style: italic;
        }

        .poppins-light-italic {
            font-family: "Poppins", serif;
            font-weight: 300;
            font-style: italic;
        }

        .poppins-regular-italic {
            font-family: "Poppins", serif;
            font-weight: 400;
            font-style: italic;
        }

        .poppins-medium-italic {
            font-family: "Poppins", serif;
            font-weight: 500;
            font-style: italic;
        }

        .poppins-semibold-italic {
            font-family: "Poppins", serif;
            font-weight: 600;
            font-style: italic;
        }

        .poppins-bold-italic {
            font-family: "Poppins", serif;
            font-weight: 700;
            font-style: italic;
        }

        .poppins-extrabold-italic {
            font-family: "Poppins", serif;
            font-weight: 800;
            font-style: italic;
        }

        .poppins-black-italic {
            font-family: "Poppins", serif;
            font-weight: 900;
            font-style: italic;
        }
    </style>
    <!-- Customização do Tailwind CSS -->
    <style type="text/tailwindcss">
        .ml-percent-15 {
            margin-left: 15%;
        }

        .ml-percent-5 {
            margin-left: 5%;
        }

        .ml-percent-1 {
            margin-left: 1%;
        }

        .mr-percent-1 {
            margin-right: 1%;
        }

        .mr-percent-5 {
            margin-right: 5%;
        }

        .mr-percent-10 {
            margin-right: 10%;
        }

        .div-flex {
            display: flex;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <br>
    <nav class="bg-[#272727] text-white py-4 ml-percent-5 mr-percent-5 rounded-xl">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <!-- Logo -->
            <div class="text-xl font-bold flex items-center">
                <img src="{{ asset('images/icon_School_White.png') }}" alt="Logo" class="w-12 h-auto mr-percent-5">
                <a href="{{ route('welcome') }}" class="hover:text-gray-500 transition duration-300">Scholarium</a>
            </div>
            <!-- Links -->
            <div class="hidden md:flex space-x-6 text-lg">
                <a href="{{ route('contato') }}" class="hover:text-gray-500 transition duration-300"><i
                        class="bi bi-envelope-at"></i> Contato</a>
                <a href="{{ route('instituicao.create') }}" class="hover:text-gray-500 transition duration-300"><i
                        class="bi bi-people"></i> Começar</a>
                <a href="{{ route('login') }}" class="hover:text-gray-500 transition duration-300"><i
                        class="bi bi-box-arrow-in-right"></i> Login</a>
            </div>
            <!-- Ícone de Menu Hamburguer (para telas pequenas) -->
            <button class="md:hidden text-2xl" id="hamburger-icon">
                <i class="bi bi-list"></i>
            </button>
        </div>
        <!-- Menu Responsivo Mobile -->
        <div class="md:hidden hidden text-lg" id="mobile-menu">
            <br>
            <a href="{{ route('contato') }}" class="block text-center py-2 hover:text-gray-500"><i
                    class="bi bi-envelope-at"></i> Contato</a>
            <a href="{{ route('instituicao.create') }}" class="block text-center py-2 hover:text-gray-500"><i
                    class="bi bi-people"></i> Começar</a>
            <a href="{{ route('login') }}" class="block text-center py-2 hover:text-gray-500"><i
                    class="bi bi-box-arrow-in-right"></i> Login</a>

        </div>
    </nav>
    <!-- Identificação do Sistema -->
    <br><br>
    <div class="text-center ml-percent-5 mr-percent-5">
        <!-- Logo e Nome do Site -->
        <div class="flex justify-center items-center">
            <img src="{{ asset('images/page_Icon.png') }}" alt="Logo" class="w-64 h-64 ml-percent-10">
        </div>
        <!-- Descrição -->
        <p class="text-[#272727] poppins-regular text-lg"><b>Gestão Inteligente, Ensino Eficiente!</b></p>
    </div>
    <!-- O que é? -->
    <br><br><br>
    <div
        class="shadow-md hover:shadow-lg transition inset-shadow-sm inset-shadow-gray-400/90 ml-percent-5 mr-percent-5 rounded-xl">
        <div class="p-6">
            <h1 class="poppins-regular text-2xl">🏫 O que é o <b>Scholarium</b>?</h1>
            <br>
            <p class="poppins-regular text-lg text-justify">O <b>Scholarium</b> é um sistema de gestão escolar que
                facilita o controle acadêmico, oferecendo funcionalidades como cadastro de alunos, professores e turmas,
                lançamento de notas, controle de presença e geração de relatórios. Além disso, possui recursos extras
                como painéis personalizados para alunos e professores e login por perfis, tudo com o objetivo de tornar
                a administração escolar mais eficiente e organizada.</p>
        </div>
    </div>
    <br><br>
    <!-- Cards -->
    <div class="ml-percent-5 mr-percent-5">
        <h1 class="poppins-regular text-2xl justify-self-center"><i class="bi bi-book-half"></i> Nossos Serviços <i
                class="bi bi-book-half"></i></h1>
        <br>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Card 1 -->
            <div
                class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition inset-shadow-sm inset-shadow-gray-400/90">
                <img src="{{ asset('images/img_CadUser.png') }}" class="w-40 justify-self-center"
                    alt="Cadastro de Alunos">
                <h2 class="text-xl poppins-regular mb-2 text-center">🎓 Gestão de Alunos</h2>
                <p class="poppins-regular text-gray-700 text-center">Cadastre e gerencie alunos de forma simples e
                    eficiente, mantendo um histórico acadêmico completo e acessível.</p>
            </div>
            <!-- Card 2 -->
            <div
                class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition inset-shadow-sm inset-shadow-gray-400/90">
                <img src="{{ asset('images/img_Class.png') }}" class="w-40 justify-self-center" alt="Gestão de Turmas">
                <h2 class="text-xl poppins-regular mb-2 text-center">📅 Gestão de Turmas</h2>
                <p class="poppins-regular text-gray-700 text-center">Organize e gerencie as turmas, vincule alunos aos
                    professores e defina horários de aula, tudo em um único lugar.</p>
            </div>
            <!-- Card 3 -->
            <div
                class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition inset-shadow-sm inset-shadow-gray-400/90">
                <img src="{{ asset('images/img_Notas.png') }}" class="w-40 justify-self-center"
                    alt="Lançamento de Notas">
                <h2 class="text-xl poppins-regular mb-2 text-center">📝 Lançamento de Notas</h2>
                <p class="poppins-regular text-gray-700 text-center">Registre e acompanhe o desempenho dos alunos com
                    facilidade, gerando relatórios detalhados e boletins escolares.</p>
            </div>
        </div>
    </div>
    <br><br>
    <footer class="bg-[#272727] text-white py-8 ml-percent-5 mr-percent-5 rounded-xl">
        <div class="container mx-auto px-6 flex flex-col md:flex-row justify-between items-center poppins-regular">
            <!-- Logo e descrição -->
            <div class="text-center md:text-left">
                <p class="text-xl font-bold">Scholarium</p>
                <p class="text-sm text-gray-400">Gestão Inteligente, Ensino Eficiente!</p>
            </div>
            <!-- Direitos autorais -->
            <div class="text-sm text-gray-400 mt-6 md:mt-0">
                © 2025 Scholarium. Todos os direitos reservados.
            </div>
        </div>
    </footer>
    <br>
</body>

</html>
