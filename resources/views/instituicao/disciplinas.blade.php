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
    <title>Disciplinas - Instituição</title>
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

        <h1 class="text-2xl font-bold mb-5"><i class="bi bi-journal-bookmark"></i> Disciplinas</h1>
        <p>Aqui você pode gerenciar as Disciplinas cadastradas em sua Instituição de Ensino.</p><br>
        <div class="flex">
            <div class="bg-white rounded-xl shadow-2xl poppins-regular w-1/2 mr-5">
                <div class="px-6 py-5">
                    <h3 class="text-xl font-bold text-[#272727]"><i class="bi bi-journal-bookmark"></i> Informações
                        Gerais</h3>
                    <br>
                    <div class="flex justify-between">
                        <h1><i class="bi bi-journal-bookmark"></i> Disciplinas Cadastradas</h1>
                        <h1 class="text-lg font-bold text-[#272727]">{{ $totalDisciplinas }}</h1>
                    </div>
                    <br><br>
                    <div class="flex justify-between ml-5">
                        <h1><i class="bi bi-check-circle"></i> Disciplinas Ativas</h1>
                        <h1 class="text-lg font-bold text-[#272727]">{{ $totalDisciplinasAtivas }}</h1>
                    </div>
                    <br>
                    <div class="flex justify-between ml-5">
                        <h1><i class="bi bi-ban"></i> Disciplinas Inativas</h1>
                        <h1 class="text-lg font-bold text-[#272727]">{{ $totalDisciplinasInativas }}</h1>
                    </div>
                    <br><br>
                    <h3 class="text-xl font-bold text-[#272727]"><i class="bi bi-filetype-pdf"></i> Relatórios</h3>
                    <br>
                    <div class="flex justify-center">
                        <a href="{{ route('reports.cursos', ['status' => 'todos']) }}"
                           class="inline-block bg-[#272727] text-white font-semibold py-2 px-5 rounded-lg shadow hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-opacity-75 transition-colors content-center mr-5">
                            <i class="bi bi-filetype-pdf"></i> Dis. Cadastradas
                        </a>
                        <a href="{{ route('reports.cursos', ['status' => 'ativos']) }}"
                           class="inline-block bg-[#272727] text-white font-semibold py-2 px-5 rounded-lg shadow hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-opacity-75 transition-colors content-center mr-5">
                            <i class="bi bi-filetype-pdf"></i> Dis. Ativas
                        </a>
                        <a href="{{ route('reports.cursos', ['status' => 'inativos']) }}"
                           class="inline-block bg-[#272727] text-white font-semibold py-2 px-5 rounded-lg shadow hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-opacity-75 transition-colors content-center">
                            <i class="bi bi-filetype-pdf"></i> Dis. Inativas
                        </a>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-2xl poppins-regular w-1/2">
                <div class="px-6 py-5">
                    <h3 class="text-xl font-bold text-[#272727]"><i class="bi bi-bar-chart-line"></i> Disciplinas </h3>
                    <br>
                    <canvas id="graficoNiveis" width="400" height="200"></canvas>

                </div>
            </div>
        </div>
        <br>
        <div class="bg-white rounded-xl shadow-2xl poppins-regular">
            <div class="px-6 py-5">
                <h3 class="text-xl font-bold text-[#272727]"><i class="bi bi-plus-square"></i> Cadastrar Disciplina</h3>
                <br>
                <h2 class="text-md font-bold text-gray-800 mb-4"><i class="bi bi-award"></i> Dados da Disciplina</h2>
                <div>
                    {{-- Garanta que a rota 'disciplinas.store' existe no seu arquivo web.php --}}
                    <form action="{{ route('instituicao.disciplinas.store') }}" method="POST" enctype="multipart/form-data" id="formDisciplina">
                        @csrf
                        @if ($errors->any())
                            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-lg" role="alert">
                                <p class="font-bold">Ocorreram alguns erros. Por favor, verifique:</p>
                                <ul class="list-disc pl-5 mt-2">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        {{-- LINHA 1: NOME E CURSO --}}
                        <div class="flex flex-wrap -mx-2">
                            <div class="mb-4 w-full md:w-1/2 px-2">
                                <label class="block text-[#272727] text-sm font-bold mb-2" for="nomeDisciplina">
                                    <i class="bi bi-alphabet"></i> Nome<span class="text-red-800">*</span>
                                </label>
                                <input
                                    type="text"
                                    name="nomeDisciplina"
                                    id="nomeDisciplina"
                                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-600"
                                    placeholder="Ex.: Matemática III, Algoritmos e Estruturas de Dados, etc."
                                    value="{{ old('nomeDisciplina') }}"
                                    required
                                >
                            </div>
                            <div class="mb-4 w-full md:w-1/2 px-2">
                                <label class="block text-[#272727] text-sm font-bold mb-2" for="cursoDisciplina">
                                    <i class="bi bi-award"></i> Curso<span class="text-red-800">*</span>
                                </label>
                                <select name="cursoDisciplina" id="cursoDisciplina" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-600" required>
                                    <option value="" disabled selected>Selecione um Curso</option>
                                    {{-- Este loop deve ser populado pelo seu Controller --}}
                                    @foreach ($cursos as $curso)
                                        <option value="{{ $curso->id }}" {{ old('cursoDisciplina') == $curso->id ? 'selected' : '' }}>
                                            {{ $curso->id }} - {{ $curso->nomeCurso }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- ========================================================== --}}
                        {{--    LINHA 2: CAMPOS DE CARGA HORÁRIA E TIPO RESTAURADOS AQUI   --}}
                        {{-- ========================================================== --}}
                        <div class="flex flex-wrap -mx-2">
                            <div class="mb-4 w-full md:w-1/3 px-2">
                                <label class="block text-[#272727] text-sm font-bold mb-2" for="cargaDisciplina">
                                    <i class="bi bi-clock"></i> Carga Horária (Horas)<span class="text-red-800">*</span>
                                </label>
                                <input
                                    type="number"
                                    name="cargaDisciplina"
                                    id="cargaDisciplina"
                                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-600"
                                    placeholder="Ex.: 120, 60, 30"
                                    value="{{ old('cargaDisciplina') }}"
                                    required
                                >
                            </div>
                            <div class="mb-4 w-full md:w-1/3 px-2">
                                <label class="block text-[#272727] text-sm font-bold mb-2" for="tipoDisciplina">
                                    <i class="bi bi-journal-bookmark"></i> Tipo de Disciplina<span class="text-red-800">*</span>
                                </label>
                                <select name="tipoDisciplina" id="tipoDisciplina" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-600" required>
                                    <option value="" disabled {{ old('tipoDisciplina') ? '' : 'selected' }}>Selecione o Tipo</option>
                                    <option value="Anual" {{ old('tipoDisciplina') == 'Anual' ? 'selected' : '' }}>Anual</option>
                                    <option value="Semestral" {{ old('tipoDisciplina') == 'Semestral' ? 'selected' : '' }}>Semestral</option>
                                </select>
                            </div>
                            <div class="mb-4 w-full md:w-1/3 px-2">
                                <label class="block text-[#272727] text-sm font-bold mb-2" for="ementaDisciplina">
                                    <i class="bi bi-paperclip"></i> Ementa (PDF, DOCX) Max. 5MB<span class="text-red-800">*</span>
                                </label>
                                <input
                                    type="file"
                                    name="ementaDisciplina"
                                    id="ementaDisciplina"
                                    class="block w-full text-sm text-gray-500 border border-gray-300 rounded-lg cursor-pointer
                file:mr-4 file:py-2 file:px-4
                file:rounded-md file:border-0
                file:text-sm file:font-semibold
                file:bg-[#272727] file:text-white
                hover:file:bg-gray-700"
                                    accept=".pdf,.doc,.docx"
                                >
                            </div>
                        </div>

                        {{-- LINHA 3: DESCRIÇÃO --}}
                        <div class="flex">
                            <div class="mb-4 w-full">
                                <label class="block text-[#272727] text-sm font-bold mb-2" for="descricaoDisciplina">
                                    <i class="bi bi-body-text"></i> Descrição (Max. 200 caracteres)
                                </label>
                                <textarea
                                    name="descricaoDisciplina"
                                    id="descricaoDisciplina"
                                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-600"
                                    placeholder="Descreva a Disciplina, seus objetivos, etc."
                                    rows="3"
                                    maxlength="200"
                                    style="resize: none"
                                >{{ old('descricaoDisciplina') }}</textarea>
                            </div>
                        </div>

                        {{-- BOTÕES DE AÇÃO --}}
                        <div class="flex justify-end mt-4">
                            <button type="button" id="btnLimparCampos" class="cursor-pointer bg-gray-300 hover:bg-red-200 text-[#272727] py-2 px-4 rounded-lg mr-5">
                                <i class="bi bi-eraser-fill"></i> Limpar Campos
                            </button>
                            <button type="submit" class="cursor-pointer bg-[#272727] hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-lg">
                                <i class="bi bi-floppy"></i> Salvar Disciplina
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        @include('components._footer')
        <script src="{{ asset('js/resetInputFormCursos.js') }}"></script>
</body>
</html>
