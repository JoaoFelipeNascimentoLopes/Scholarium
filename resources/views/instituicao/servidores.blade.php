<!DOCTYPE html>
<html lang="pt-BR" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/js/app.js'])
    <link rel="icon" href="{{ asset('images/page_Icon.png') }}" type="image/png">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=history_edu"/>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet"/>
    <title>Servidores - Instituição</title>
    <style>
        .poppins-regular { font-family: "Poppins", serif; font-weight: 400; }
        .poppins-semibold { font-family: "Poppins", serif; font-weight: 600; }
        .poppins-bold { font-family: "Poppins", serif; font-weight: 700; }
    </style>
    <style type="text/tailwindcss">
        .sidebar-transition { transition: transform 0.3s ease-in-out, width 0.3s ease-in-out; }
        .content-transition { transition: margin-left 0.3s ease-in-out; }
    </style>
</head>
<body class="bg-gray-50">
<div class="flex h-screen">
    @include('components._sidebar')
    <div id="main-content" class="flex-1 ml-64 p-10 content-transition poppins-regular">
        <div class="fixed top-0 left-0 w-full bg-white shadow-md p-4 z-10 md:hidden">
            <button id="hamburger-button" class="text-gray-800 focus:outline-none cursor-pointer">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>
        <button id="hamburger-button-desktop" class="text-white bg-[#272727] rounded-sm p-2 focus:outline-none mb-4 hidden md:block cursor-pointer">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>
        <h1 class="text-2xl font-bold mb-2"><i class="bi bi-person-badge"></i> Servidores</h1>
        <p class="mb-6 text-gray-600">Aqui você pode gerenciar os Servidores cadastrados em sua Instituição de Ensino.</p>

        <!-- ESTRUTURA DE ABAS -->
        <div class="mb-4 border-b border-gray-200">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" role="tablist">
                <li class="mr-2" role="presentation">
                    <button class="tab-button inline-block p-4 border-b-2 rounded-t-lg" type="button" role="tab" onclick="openTab(event, 'painel')">
                        <i class="bi bi-grid-1x2-fill mr-1"></i> Painel Principal
                    </button>
                </li>
                <li class="mr-2" role="presentation">
                    <button class="tab-button inline-block p-4 border-b-2 rounded-t-lg" type="button" role="tab" onclick="openTab(event, 'gerenciamento')">
                        <i class="bi bi-pencil-square mr-1"></i> Gerenciamento
                    </button>
                </li>
                <li class="mr-2" role="presentation">
                    <button class="tab-button inline-block p-4 border-b-2 rounded-t-lg" type="button" role="tab" onclick="openTab(event, 'relatorios')">
                        <i class="bi bi-file-earmark-text-fill mr-1"></i> Relatórios
                    </button>
                </li>
            </ul>
        </div>

        <!-- CONTEÚDO DAS ABAS -->
        <div id="tabContent">
            <!-- Aba 1: Painel Principal -->
            <div id="painel" class="tab-content hidden p-4">
                <div class="bg-white rounded-xl shadow-2xl p-5">
                    <h3 class="text-xl font-bold text-[#272727]"><i class="bi bi-bar-chart-line-fill"></i> Painel de Servidores</h3>
                    <p class="mt-2 text-gray-600">Em breve: cards com informações gerais e gráficos.</p>
                    <!-- TODO: Adicionar cards e gráficos aqui -->
                </div>
            </div>

            <!-- Aba 2: Gerenciamento -->
            <div id="gerenciamento" class="tab-content hidden p-4">
                <div class="bg-white rounded-xl shadow-2xl poppins-regular mb-6">
                    <div class="px-6 py-5">
                        <h3 class="text-xl font-bold text-[#272727]"><i class="bi bi-plus-square"></i> Cadastrar Servidor</h3>
                        <p class="mt-2 text-gray-600">Preencha os dados abaixo para adicionar um novo servidor à equipe.</p>
                        <form action="{{ route('instituicao.cursos.store') }}" method="POST" id="formServidores" enctype="multipart/form-data">
                        @csrf
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-2xl poppins-regular">
                    <h2 class="text-xl font-bold text-[#272727] mb-4 px-6 py-5"><i class="bi bi-table"></i> Lista de Servidores Cadastrados</h2>
                    <div class="overflow-x-auto px-6 pb-5">
                        <!-- TODO: Adicionar tabela com a lista de servidores aqui -->
                        <p class="text-center text-gray-500">A tabela de servidores será exibida aqui.</p>
                    </div>
                </div>
            </div>

            <!-- Aba 3: Relatórios -->
            <div id="relatorios" class="tab-content hidden p-4">
                <div class="bg-white rounded-xl shadow-2xl poppins-regular">
                    <div class="px-6 py-5">
                        <h3 class="text-xl font-bold text-[#272727]"><i class="bi bi-filetype-pdf"></i> Relatórios de Servidores</h3>
                        <p class="mt-2 text-gray-600">Gere relatórios sobre a equipe administrativa.</p>
                        <!-- TODO: Adicionar botões de relatório aqui -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SCRIPT PARA CONTROLE DAS ABAS -->
<script src="{{ asset('js/tabsManager_Servidores.js') }}"></script>
</body>
</html>

