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
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=history_edu"/>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet"/>
    <title>Estudantes - Instituição</title>
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

        .sidebar-transition {
            transition: transform 0.3s ease-in-out, width 0.3s ease-in-out;
        }

        .content-transition {
            transition: margin-left 0.3s ease-in-out;
        }
    </style>
</head>
<body>
<div class="flex h-screen">

    <!-- Sidebar -->
    @include('components._sidebar')

    <div id="main-content" class="flex-1 ml-64 p-10 content-transition poppins-regular">
        <div class="fixed top-0 left-0 w-full bg-white shadow-md p-4 z-10 md:hidden">
            <button id="hamburger-button" class="text-gray-800 focus:outline-none cursor-pointer">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>

        <button id="hamburger-button-desktop"
                class="text-white bg-[#272727] rounded-sm p-2 focus:outline-none mb-4 hidden md:block cursor-pointer">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                 xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>

        <h1 class="text-2xl font-bold mb-5"><i class="bi bi-backpack2"></i> Estudantes</h1>
        <p>Aqui você pode gerenciar os estudantes cadastrados em sua Instituição de Ensino.</p><br>
        <div class="flex">
            <div class="bg-white rounded-xl shadow-2xl poppins-regular w-1/2 mr-5">
                <div class="px-6 py-5">
                    <h3 class="text-xl font-bold text-[#272727]"><i class="bi bi-backpack2"></i> Informações Gerais</h3>
                    <br>
                    <div class="flex justify-between">
                        <h1><i class="bi bi-award"></i> Estudantes Cadastrados</h1>
                        <h1 class="text-lg font-bold text-[#272727]"></h1>
                    </div>
                    <br><br>
                    <div class="flex justify-between ml-5">
                        <h1><i class="bi bi-check-circle"></i> Estudantes Ativos</h1>
                        <h1 class="text-lg font-bold text-[#272727]"></h1>
                    </div>
                    <br>
                    <div class="flex justify-between ml-5">
                        <h1><i class="bi bi-ban"></i> Estudantes Inativos</h1>
                        <h1 class="text-lg font-bold text-[#272727]"></h1>
                    </div>
                    <br><br>
                    <h3 class="text-xl font-bold text-[#272727]"><i class="bi bi-filetype-pdf"></i> Relatórios</h3>
                    <br>
                    <div class="flex justify-center">
                        <a href="{{ route('reports.cursos', ['status' => 'todos']) }}"
                           class="inline-block bg-[#272727] text-white font-semibold py-2 px-5 rounded-lg shadow hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-opacity-75 transition-colors content-center mr-5">
                            <i class="bi bi-filetype-pdf"></i> Estud. Cadastrados
                        </a>
                        <a href="{{ route('reports.cursos', ['status' => 'ativos']) }}"
                           class="inline-block bg-[#272727] text-white font-semibold py-2 px-5 rounded-lg shadow hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-opacity-75 transition-colors content-center mr-5">
                            <i class="bi bi-filetype-pdf"></i> Estud. Ativos
                        </a>
                        <a href="{{ route('reports.cursos', ['status' => 'inativos']) }}"
                           class="inline-block bg-[#272727] text-white font-semibold py-2 px-5 rounded-lg shadow hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-opacity-75 transition-colors content-center">
                            <i class="bi bi-filetype-pdf"></i> Estud. Inativos
                        </a>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-2xl poppins-regular w-1/2">
                <div class="px-6 py-5">
                    <h3 class="text-xl font-bold text-[#272727]"><i class="bi bi-bar-chart-line"></i> Estudantes por Curso
                    </h3>
                    <br>
                    <canvas id="graficoNiveis" width="400" height="200"></canvas>

                </div>
            </div>
        </div>
        <br>
        <div class="bg-white rounded-xl shadow-2xl poppins-regular">
            <div class="px-6 py-5">
                <h3 class="text-xl font-bold text-[#272727]"><i class="bi bi-plus-square"></i> Cadastrar Estudante</h3>
                <br>
                {{--
                <form action="#" method="POST" class="space-y-8" id="formEstudantes">
                    @csrf
                    <!-- ================================== -->
                    <!-- ====== SESSÃO DADOS PESSOAIS ====== -->
                    <!-- ================================== -->
                    <fieldset class="border-t-2 border-gray-200 pt-6">
                        <legend class="text-xl font-semibold text-[#272727] px-4"><i class="bi bi-person-badge"></i> Dados Pessoais</legend>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">

                            <!-- Nome Completo -->
                            <div class="md:col-span-2">
                                <label for="nomeEstudante" class="block text-sm font-medium text-[#272727] mb-1">Nome Completo</label>
                                <input type="text" name="nomeEstudante" id="nomeEstudante" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#272727] transition-all" placeholder="Digite o nome completo">
                            </div>

                            <!-- Data de Nascimento -->
                            <div>
                                <label for="dataNasEstudante" class="block text-sm font-medium text-[#272727] mb-1">Data de Nascimento</label>
                                <input type="date" name="dataNasEstudante" id="dataNasEstudante" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#272727] transition-all">
                            </div>

                            <!-- CPF -->
                            <div>
                                <label for="cpfEstudante" class="block text-sm font-medium text-[#272727] mb-1">CPF</label>
                                <input type="text" name="cpfEstudante" id="cpfEstudante" required class="w-full px-4 py-2 border  rounded-lg focus:outline-none focus:ring-2 focus:ring-[#272727] transition-all" placeholder="000.000.000-00">
                            </div>

                            <!-- RG -->
                            <div>
                                <label for="telefoneEstudante" class="block text-sm font-medium text-[#272727] mb-1">Telefone</label>
                                <input type="text" name="telefoneEstudante" id="telefoneEstudante" class="w-full px-4 py-2 border  rounded-lg focus:outline-none focus:ring-2 focus:ring-[#272727] transition-all" placeholder="(00) 9 1234-5678">
                            </div>

                            <!-- E-mail -->
                            <div>
                                <label for="emailEstudante" class="block text-sm font-medium text-[#272727] mb-1">E-mail</label>
                                <input type="email" name="emailEstudante" id="emailEstudante" required class="w-full px-4 py-2 border  rounded-lg focus:outline-none focus:ring-2 focus:ring-[#272727] transition-all" placeholder="exemplo@email.com">
                            </div>

                        </div>
                    </fieldset>

                    <!-- ============================== -->
                    <!-- ====== SESSÃO ENDEREÇO ====== -->
                    <!-- ============================== -->
                    <fieldset class="border-t-2 border-gray-200 pt-6">
                        <legend class="text-xl font-semibold text-[#272727] px-4"><i class="bi bi-geo-alt"></i> Endereço</legend>
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-4">

                            <!-- CEP -->
                            <div class="md:col-span-1">
                                <label for="cepEstudante" class="block text-sm font-medium text-[#272727] mb-1">CEP</label>
                                <input type="text" name="cepEstudante" id="cepEstudante" class="w-full px-4 py-2 border  rounded-lg focus:outline-none focus:ring-2 focus:ring-[#272727] transition-all" placeholder="00000-000">
                            </div>

                            <!-- Logradouro -->
                            <div class="md:col-span-3">
                                <label for="logradouroEstudante" class="block text-sm font-medium text-[#272727] mb-1">Logradouro</label>
                                <input type="text" name="logradouroEstudante" id="logradouroEstudante" class="w-full px-4 py-2 border  rounded-lg bg-gray-50 focus:outline-none" readonly>
                            </div>

                            <!-- Número -->
                            <div class="md:col-span-1">
                                <label for="numeroEstudante" class="block text-sm font-medium text-[#272727] mb-1">Número</label>
                                <input type="text" name="numeroEstudante" id="numeroEstudante" class="w-full px-4 py-2 border  rounded-lg focus:outline-none focus:ring-2 focus:ring-[#272727] transition-all">
                            </div>

                            <!-- Bairro -->
                            <div class="md:col-span-3">
                                <label for="bairroEstudante" class="block text-sm font-medium text-[#272727] mb-1">Bairro</label>
                                <input type="text" name="bairroEstudante" id="bairroEstudante" class="w-full px-4 py-2 border  rounded-lg bg-gray-50 focus:outline-none" readonly>
                            </div>

                            <!-- Cidade -->
                            <div class="md:col-span-2">
                                <label for="cidadeEstudante" class="block text-sm font-medium text-[#272727] mb-1">Cidade</label>
                                <input type="text" name="cidadeEstudante" id="cidadeEstudante" class="w-full px-4 py-2 border  rounded-lg bg-gray-50 focus:outline-none" readonly>
                            </div>

                            <!-- UF -->
                            <div class="md:col-span-2">
                                <label for="ufEstudante" class="block text-sm font-medium text-[#272727] mb-1">Estado (UF)</label>
                                <input type="text" name="ufEstudante" id="ufEstudante" class="w-full px-4 py-2 border  rounded-lg bg-gray-50 focus:outline-none" readonly>
                            </div>

                        </div>
                    </fieldset>

                    <!-- ================================ -->
                    <!-- ====== SESSÃO RESPONSÁVEL ====== -->
                    <!-- ================================ -->
                    <fieldset id="sessaoResponsavel" class="border-t-2 border-gray-200 pt-6 hidden transition-all duration-500">
                        <legend class="text-xl font-semibold text-[#272727] px-4"><i class="bi bi-person-heart"></i> Dados do Responsável (Obrigatório para menores de 18 anos)</legend>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">

                            <!-- Nome do Responsável -->
                            <div class="md:col-span-2">
                                <label for="nomeResponsavel" class="block text-sm font-medium text-[#272727] mb-1">Nome Completo do Responsável</label>
                                <input type="text" name="nomeResponsavel" id="nomeResponsavel" class="w-full px-4 py-2 border  rounded-lg focus:outline-none focus:ring-2 focus:ring-[#272727] transition-all" placeholder="Digite o nome completo">
                            </div>

                            <!-- CPF do Responsável -->
                            <div>
                                <label for="cpfResponsavel" class="block text-sm font-medium text-[#272727] mb-1">CPF do Responsável</label>
                                <input type="text" name="cpfResponsavel" id="cpfResponsavel" class="w-full px-4 py-2 border  rounded-lg focus:outline-none focus:ring-2 focus:ring-[#272727] transition-all" placeholder="000.000.000-00">
                            </div>

                            <!-- Grau de Parentesco -->
                            <div>
                                <label for="parentescoResponsavel" class="block text-sm font-medium text-[#272727] mb-1">Grau de Parentesco</label>
                                <select name="parentescoResponsavel" id="parentescoResponsavel" class="w-full px-4 py-2 border  rounded-lg focus:outline-none focus:ring-2 focus:ring-[#272727] transition-all">
                                    <option value="">Selecione...</option>
                                    <option value="Pai">Pai</option>
                                    <option value="Mãe">Mãe</option>
                                    <option value="Tutor Legal">Tutor Legal</option>
                                    <option value="Avô/Avó">Avô/Avó</option>
                                    <option value="Outro">Outro</option>
                                </select>
                            </div>

                            <!-- E-mail do Responsável -->
                            <div>
                                <label for="emailResponsavel" class="block text-sm font-medium text-[#272727] mb-1">E-mail do Responsável</label>
                                <input type="email" name="emailResponsavel" id="emailResponsavel" class="w-full px-4 py-2 border  rounded-lg focus:outline-none focus:ring-2 focus:ring-[#272727] transition-all" placeholder="exemplo.responsavel@email.com">
                            </div>

                            <!-- Telefone do Responsável -->
                            <div>
                                <label for="telefoneResponsavel" class="block text-sm font-medium text-[#272727] mb-1">Telefone do Responsável</label>
                                <input type="tel" name="telefoneResponsavel" id="telefoneResponsavel" class="w-full px-4 py-2 border  rounded-lg focus:outline-none focus:ring-2 focus:ring-[#272727] transition-all" placeholder="(00) 9 1234-5678">
                            </div>
                        </div>
                    </fieldset>

                    <!-- ========================= -->
                    <!-- ====== BOTÃO ENVIAR ====== -->
                    <!-- ========================= -->
                    <div class="flex justify-end pt-4">
                        <button type="button" id="btnLimparCampos"
                                class="cursor-pointer bg-gray-300 hover:bg-red-200 text-[#272727] py-2 px-4 rounded-lg mr-5">
                            <i class="bi bi-eraser-fill"></i> Limpar Campos
                        </button>
                        <button type="submit" class="px-8 py-3 bg-[#272727] text-white font-semibold rounded-lg shadow-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-[#272727] focus:ring-offset-2 transition-all">
                            <i class="bi bi-floppy"></i> Cadastrar Estudante
                        </button>
                    </div>
                </form>
                --}}
            </div>
        </div>
        <br>
    </div>
</div>
<script src="{{ asset('js/dinamismFormEstudantes.js') }}"></script>
<script src="{{ asset('js/resetInputFormCursos.js') }}"></script>
</body>
</html>
