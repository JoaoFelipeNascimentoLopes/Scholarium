<!DOCTYPE html>
<html lang="pt-BR" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Adiciona Arquivos CSS e JS Externos com o Vite -->
    @vite(['resources/js/app.js'])
    <link rel="icon" href="{{ asset('images/page_Icon.png') }}" type="image/png">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> {{-- Biblioteca para Gerar Gráficos  --}}
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script> {{-- Plugin para adionar detalhes na Biblioteca de Gráficos  --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @livewireStyles
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=history_edu"/>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet"/>
    <title>Disciplinas - Instituição</title>
    <!-- Fontes -->
    <style>
        .poppins-regular { font-family: "Poppins", serif; font-weight: 400; }
        .poppins-semibold { font-family: "Poppins", serif; font-weight: 600; }
        .poppins-bold { font-family: "Poppins", serif; font-weight: 700; }
    </style>
    <!-- Customização do Tailwind CSS -->
    <style type="text/tailwindcss">
        .sidebar-transition {
            transition: transform 0.3s ease-in-out, width 0.3s ease-in-out;
        }
        .content-transition {
            transition: margin-left 0.3s ease-in-out;
        }
    </style>
</head>
<body class="bg-gray-50">
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

        <h1 class="text-2xl font-bold mb-2"><i class="bi bi-journal-bookmark"></i> Disciplinas</h1>
        <p class="mb-6 text-gray-600">Aqui você pode gerenciar as Disciplinas cadastradas em sua Instituição de Ensino.</p>

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
                <div class="flex flex-wrap -mx-2">
                    <div class="w-full md:w-1/2 px-2 mb-4">
                        <div class="bg-white rounded-xl shadow-2xl poppins-regular h-full">
                            <div class="px-6 py-5">
                                <h3 class="text-xl font-bold text-[#272727]"><i class="bi bi-journal-bookmark"></i> Informações Gerais</h3>
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
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 px-2 mb-4">
                        <div class="bg-white rounded-xl shadow-lg h-full">
                            <div class="px-6 py-5">
                                <h3 class="text-xl font-bold text-[#272727]"><i class="bi bi-bar-chart-line"></i> Disciplinas por Curso</h3>
                                <br>
                                <div class="relative h-64 md:h-80">
                                    <canvas id="graficoDisciplinasPorCurso"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Aba 2: Gerenciamento -->
            <div id="gerenciamento" class="tab-content hidden p-4">
                <div class="bg-white rounded-xl shadow-2xl poppins-regular mb-6">
                    <div class="px-6 py-5">
                        <h3 class="text-xl font-bold text-[#272727]"><i class="bi bi-plus-square"></i> Cadastrar Disciplina</h3>
                        <br>
                        <h2 class="text-md font-bold text-gray-800 mb-4"><i class="bi bi-award"></i> Dados da Disciplina</h2>
                        <div>
                            <form action="{{ route('instituicao.disciplinas.store') }}" method="POST" enctype="multipart/form-data" id="formDisciplina">
                                @csrf

                                {{-- Exibe erros de validação, se houver --}}
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

                                <div class="flex flex-wrap -mx-2">
                                    <div class="mb-4 w-full md:w-2/3 px-2">
                                        <label class="block text-[#272727] text-sm font-bold mb-2" for="nomeDisciplina">
                                            <i class="bi bi-alphabet"></i> Nome da Disciplina<span class="text-red-800">*</span>
                                        </label>
                                        {{-- CORREÇÃO: 'name' ajustado para 'nomeDisciplina' (singular) --}}
                                        <input
                                            type="text"
                                            name="nomeDisciplina"
                                            id="nomeDisciplina"
                                            class="w-full px-3 py-2 border border-black rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-600"
                                            placeholder="Ex.: Matemática III, Algoritmos e Estruturas de Dados"
                                            value="{{ old('nomeDisciplina') }}"
                                            required
                                        >
                                    </div>
                                    <div class="mb-4 w-full md:w-1/3 px-2">
                                        <label class="block text-[#272727] text-sm font-bold mb-2" for="cursoDisciplina">
                                            <i class="bi bi-award"></i> Curso<span class="text-red-800">*</span>
                                        </label>
                                        <select name="cursoDisciplina" id="cursoDisciplina" class="w-full px-3 py-2 border border-black rounded-lg" required>
                                            <option value="" disabled selected>Selecione um Curso</option>
                                            @foreach ($cursos as $curso)
                                                <option
                                                    value="{{ $curso->id }}"
                                                    data-periodos="{{ $curso->periodosCurso ?? 0 }}"
                                                    {{-- ADICIONE A LINHA ABAIXO --}}
                                                    data-formato="{{ $curso->formatoCurso }}"
                                                    {{ old('cursoDisciplina') == $curso->id ? 'selected' : '' }}
                                                >
                                                    {{ $curso->nomeCurso }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="flex flex-wrap -mx-2">
                                    <div class="mb-4 w-full md:w-1/3 px-2">
                                        <label class="block text-[#272727] text-sm font-bold mb-2" for="cargaDisciplina">
                                            <i class="bi bi-clock"></i> Carga Horária (Horas)<span class="text-red-800">*</span>
                                        </label>
                                        <input
                                            type="number"
                                            name="cargaDisciplina"
                                            id="cargaDisciplina"
                                            class="w-full px-3 py-2 border border-black rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-600"
                                            placeholder="Ex.: 120"
                                            value="{{ old('cargaDisciplina') }}"
                                            min="1"
                                            required
                                        >
                                    </div>
                                    <div class="mb-4 w-full md:w-1/3 px-2">
                                        <label class="block text-[#272727] text-sm font-bold mb-2" for="tipoDisciplina">
                                            <i class="bi bi-journal-bookmark"></i> Formato da Disciplina
                                        </label>
                                        {{-- O campo oculto continua igual, ele é responsável por enviar o dado --}}
                                        <input type="hidden" name="tipoDisciplina" id="tipoDisciplinaHidden">

                                        <div class="relative mt-1">
                                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                                {{-- Colocamos o ícone aqui, posicionado na direita --}}
                                                <i class="bi bi-lock text-[#272727]"></i>
                                            </div>

                                            {{-- Adicionamos um padding à direita (pr-10) para o texto não ficar embaixo do ícone --}}
                                            <input
                                                type="text"
                                                id="tipoDisciplinaVisible"
                                                class="w-full pl-3 pr-10 border-black py-2 border rounded-lg bg-gray-200 cursor-not-allowed text-black"
                                                placeholder="Selecione um curso"
                                                readonly
                                            >
                                        </div>
                                    </div>
                                    <div class="mb-4 w-full md:w-1/3 px-2">
                                        <label class="block text-[#272727] text-sm font-bold mb-2" for="periodoDisciplina">
                                            <i class="bi bi-hash"></i> Período/Ano<span class="text-red-800">*</span>
                                        </label>
                                        <select name="periodoDisciplina" id="periodoDisciplina" class="w-full px-3 py-2 border rounded-lg bg-gray-200 cursor-not-allowed border-black" required disabled>
                                            <option value="">Disponível após a seleção de curso</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-4 w-full">
                                    <div class="flex justify-between items-center mb-2">
                                        <label class="block text-[#272727] text-sm font-bold" for="ementaDisciplina">
                                            <i class="bi bi-paperclip"></i> Ementa da Disciplina (PDF ou DOCX)<span class="text-red-800">*</span>
                                        </label>
                                        {{-- Link para baixar o modelo --}}
                                        <a href="{{ asset('modelos/modelo_ementa.docx') }}" download class="text-xs text-[#272727] hover:text-gray-700 hover:underline font-semibold">
                                            <i class="bi bi-download"></i> Baixar Modelo
                                        </a>
                                    </div>
                                    <input
                                        type="file"
                                        name="ementaDisciplina"
                                        id="ementaDisciplina"
                                        class="block w-full text-sm text-gray-500 border border-gray-300 rounded-lg cursor-pointer file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-[#272727] file:text-white hover:file:bg-gray-700"
                                        accept=".pdf,.doc,.docx"
                                    >
                                </div>

                                <div class="flex">
                                    <div class="mb-4 w-full">
                                        <label class="block text-[#272727] text-sm font-bold mb-2" for="descricaoDisciplina">
                                            <i class="bi bi-body-text"></i> Descrição (Opcional, max. 200 caracteres)
                                        </label>
                                        <textarea
                                            name="descricaoDisciplina"
                                            id="descricaoDisciplina"
                                            class="w-full px-3 py-2 border rounded-lg focus:outline-none border-black focus:ring-2 focus:ring-gray-600"
                                            placeholder="Descreva a Disciplina, seus objetivos, etc."
                                            rows="3"
                                            maxlength="200"
                                            style="resize: none"
                                        >{{ old('descricaoDisciplina') }}</textarea>
                                    </div>
                                </div>

                                <div class="flex justify-end mt-4">
                                    <button type="button" id="btnLimparCampos" class="cursor-pointer bg-gray-300 hover:bg-red-200 text-[#272727] py-2 px-4 rounded-lg mr-5">
                                        <i class="bi bi-eraser-fill"></i> Limpar Campos
                                    </button>
                                    <button type="submit" class="cursor-pointer bg-[#272727] hover:bg-gray-600 text-white py-2 px-4 rounded-lg shadow-md">
                                        <i class="bi bi-floppy"></i> Salvar Disciplina
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-2xl poppins-regular">
                    <h2 class="text-xl font-bold text-[#272727] mb-4 px-6 py-5"><i class="bi bi-table"></i> Lista de Disciplinas Cadastradas</h2>
                    <div class="overflow-x-auto px-6">
                        <div class="mb-4">
                            <label class="block text-[#272727] text-sm font-bold mb-2"><i class="bi bi-search"></i> Busca Avançada</label>
                            <form action="{{ route('instituicao.disciplinas_create') }}" method="GET" class="flex items-center gap-2">
                                <input type="hidden" name="tab" value="gerenciamento">
                                <div class="relative w-full">
                                    <input type="text" name="busca" class="w-full px-4 py-2 border border-black rounded-lg" placeholder="Pesquisar por nome da disciplina..." value="{{ request('busca') }}">
                                </div>
                                <button type="submit" class="bg-[#272727] text-white font-semibold py-2.5 px-4 rounded-lg shadow hover:bg-gray-600"><i class="bi bi-search"></i></button>
                                <a href="{{ route('instituicao.disciplinas_create', ['tab' => 'gerenciamento']) }}" class="cursor-pointer bg-gray-300 hover:bg-red-200 text-[#272727] py-2.5 px-4 rounded-lg"><i class="bi bi-eraser-fill"></i></a>
                            </form>
                        </div>
                        <br>
                        <table class="min-w-full bg-white" id="tabela-disciplinas">
                            <thead class="bg-[#272727] text-white">
                            <tr>
                                <th class="py-3 px-4 text-left text-sm font-semibold uppercase">
                                    <a href="{{ route('instituicao.disciplinas_create', request()->merge(['sortBy' => 'id', 'direction' => ($sortBy == 'id' && $direction == 'asc') ? 'desc' : 'asc', 'tab' => 'gerenciamento'])->all()) }}#tabela-disciplinas" class="flex items-center gap-2 group">ID @if($sortBy == 'id')<i class="bi {{ $direction == 'asc' ? 'bi-arrow-up' : 'bi-arrow-down' }}"></i>@else<i class="bi bi-arrow-down-up text-gray-400 group-hover:text-white"></i>@endif</a>
                                </th>
                                <th class="py-3 px-4 text-left text-sm font-semibold uppercase">
                                    <a href="{{ route('instituicao.disciplinas_create', request()->merge(['sortBy' => 'nomeDisciplina', 'direction' => ($sortBy == 'nomeDisciplina' && $direction == 'asc') ? 'desc' : 'asc', 'tab' => 'gerenciamento'])->all()) }}#tabela-disciplinas" class="flex items-center gap-2 group">Nome @if($sortBy == 'nomeDisciplina')<i class="bi {{ $direction == 'asc' ? 'bi-arrow-up' : 'bi-arrow-down' }}"></i>@else<i class="bi bi-arrow-down-up text-gray-400 group-hover:text-white"></i>@endif</a>
                                </th>
                                <th class="py-3 px-4 text-left text-sm font-semibold uppercase">
                                    <a href="{{ route('instituicao.disciplinas_create', request()->merge(['sortBy' => 'cargaDisciplina', 'direction' => ($sortBy == 'cargaDisciplina' && $direction == 'asc') ? 'desc' : 'asc', 'tab' => 'gerenciamento'])->all()) }}#tabela-disciplinas" class="flex items-center gap-2 group">CH @if($sortBy == 'cargaDisciplina')<i class="bi {{ $direction == 'asc' ? 'bi-arrow-up' : 'bi-arrow-down' }}"></i>@else<i class="bi bi-arrow-down-up text-gray-400 group-hover:text-white"></i>@endif</a>
                                </th>
                                <th class="py-3 px-10 text-left text-sm font-semibold uppercase">Curso</th>
                                <th class="py-3 px-2.5 text-left text-sm font-semibold uppercase">
                                    <a href="{{ route('instituicao.disciplinas_create', request()->merge(['sortBy' => 'statusDisciplina', 'direction' => ($sortBy == 'statusDisciplina' && $direction == 'asc') ? 'desc' : 'asc', 'tab' => 'gerenciamento'])->all()) }}#tabela-disciplinas" class="flex items-center gap-2 group">Status @if($sortBy == 'statusDisciplina')<i class="bi {{ $direction == 'asc' ? 'bi-arrow-up' : 'bi-arrow-down' }}"></i>@else<i class="bi bi-arrow-down-up text-gray-400 group-hover:text-white"></i>@endif</a>
                                </th>
                                <th class="py-3 px-4 text-center text-sm font-semibold uppercase">Ações</th>
                            </tr>
                            </thead>
                            <tbody class="text-gray-700">
                            @forelse ($disciplinas as $disciplina)
                                <tr class="border-b hover:bg-gray-100">
                                    <td class="py-3 px-4">{{ $disciplina->id }}</td>
                                    <td class="py-3 px-4">{{ $disciplina->nomeDisciplina }}</td>
                                    <td class="py-3 px-4">{{ $disciplina->cargaDisciplina }}h</td>
                                    <td class="py-3 px-10">{{ $disciplina->curso->nomeCurso }}</td>
                                    <td class="py-3 px-2.5">
                                        @if ($disciplina->statusDisciplina == 'Ativa')
                                            <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">● Ativa</span>
                                        @else
                                            <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full">● Inativa</span>
                                        @endif
                                    </td>
                                    <td class="py-3 px-4 text-center">
                                        <div class="flex justify-center items-center gap-2">
                                            <button type="button" class="text-gray-600 hover:text-blue-900 view-disciplina-details-btn" title="Ver Detalhes" data-url="{{ route('disciplinas.data', $disciplina->id) }}"><i class="bi bi-eye-fill text-lg"></i></button>
                                            @if ($disciplina->ementaDisciplina)
                                                <a href="{{ Storage::url($disciplina->ementaDisciplina) }}" download class="text-green-600 hover:text-green-900" title="Baixar Ementa"><i class="bi bi-file-earmark-arrow-down-fill text-lg"></i></a>
                                            @endif
                                            <a href="{{ route('disciplinas.edit', $disciplina->id) }}" class="text-blue-600 hover:text-blue-900" title="Alterar Disciplina"><i class="bi bi-pencil-square text-lg"></i></a>
                                            <form action="{{ route('disciplina.destroy', $disciplina->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta disciplina?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900" title="Excluir Disciplina"><i class="bi bi-trash-fill text-lg"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="6" class="py-4 px-4 text-center text-gray-500">Nenhuma disciplina encontrada.</td></tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-6 px-6 py-5">
                        {{ $disciplinas->appends(request()->query())->fragment('tabela-disciplinas')->links() }}
                    </div>
                </div>
            </div>

            <!-- Aba 3: Relatórios -->
            <div id="relatorios" class="tab-content hidden p-4">
                <div class="bg-white rounded-xl shadow-2xl poppins-regular">
                    <div class="px-6 py-5">
                        <h3 class="text-xl font-bold text-[#272727]"><i class="bi bi-filetype-pdf"></i> Relatórios Rápidos</h3>
                        <p class="mt-2 text-gray-600">Gere relatórios rápidos em PDF com a lista de disciplinas.</p>
                        <br>
                        <div class="flex gap-4">
                            <a href="{{ route('reports.disciplinas', ['status' => 'todas']) }}" class="inline-block bg-[#272727] text-white font-semibold py-2 px-5 rounded-lg shadow hover:bg-gray-600">
                                <i class="bi bi-file-earmark-text-fill"></i> Todas as Disciplinas
                            </a>
                            <a href="{{ route('reports.disciplinas', ['status' => 'ativas']) }}" class="inline-block bg-[#272727] text-white font-semibold py-2 px-5 rounded-lg shadow hover:bg-gray-600">
                                <i class="bi bi-file-earmark-check-fill"></i> Apenas as Disciplinas Ativas
                            </a>
                            <a href="{{ route('reports.disciplinas', ['status' => 'inativas']) }}" class="inline-block bg-[#272727] text-white font-semibold py-2 px-5 rounded-lg shadow hover:bg-gray-600">
                                <i class="bi bi-file-earmark-minus-fill"></i> Apenas as Disciplinas Inativas
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal - Detalhes da Disciplina -->
<div id="detailsModal" class="fixed hidden inset-0 bg-black/30 backdrop-blur-sm z-40 flex items-center justify-center p-4">
    <div class="relative mx-auto p-5 w-auto min-w-[55%] max-w-[95%] md:max-w-5xl flex flex-col max-h-[90vh] shadow-lg rounded-md bg-white">
        <div class="flex justify-between items-start pb-3">
            <h3 class="text-xl font-bold text-[#272727]"><i class="bi bi-info-circle-fill"></i> Detalhes da Disciplina</h3>
            <button id="closeModalBtn" class="text-black cursor-pointer text-2xl leading-none">&times;</button>
        </div>
        <div class="flex flex-wrap md:flex-nowrap">
            <div class="w-full md:w-1/2 md:mr-4">
                <div class="mt-4 space-y-4 poppins-regular text-justify w-full">
                    <div class="flex justify-between">
                        <p><strong><i class="bi bi-hash"></i> ID:</strong> <span id="modal-disciplina-id"></span></p>
                        <p><strong><i class="bi bi-toggles2"></i> Status:</strong> <span id="modal-disciplina-status"></span></p>
                    </div>
                    <p><strong><i class="bi bi-alphabet"></i> Nome:</strong> <span id="modal-disciplina-nome"></span></p>
                    <p><strong><i class="bi bi-award"></i> Curso:</strong> <span id="modal-disciplina-curso"></span></p>
                    <p><strong><i class="bi bi-clock"></i> Carga Horária:</strong> <span id="modal-disciplina-carga"></span></p>
                </div>
            </div>
            <div class="w-full md:w-1/2 md:ml-4">
                <div class="mt-4 space-y-4 poppins-regular">
                    <p><strong><i class="bi bi-bookmark"></i> Tipo:</strong> <span id="modal-disciplina-tipo"></span></p>
                    <p><strong><i class="bi bi-hash"></i> Período:</strong> <span id="modal-disciplina-periodo"></span></p>
                    <p><strong><i class="bi bi-people-fill"></i> Alunos:</strong> <span id="modal-disciplina-alunos">A implementar</span></p>
                    <p><strong><i class="bi bi-calendar3"></i> Criação:</strong> <span id="modal-disciplina-createdAt"></span></p>
                    <p><strong><i class="bi bi-calendar3"></i> Atualização:</strong> <span id="modal-disciplina-updatedAt"></span></p>
                </div>
            </div>
        </div>
        <div class="mt-4 pt-4 border-t">
            <p class="text-justify"><strong><i class="bi bi-card-text"></i> Descrição:</strong> <span id="modal-disciplina-descricao"></span></p>
        </div>
    </div>
</div>

@if (session('success') || session('error'))
    @php
        $toastMessage = session('success') ?? session('error');
        $isError = session()->has('error');
    @endphp
    <div id="toast-notification" class="fixed top-4 right-4 z-50 w-full max-w-xs p-4 rounded-lg shadow-lg text-white poppins-semibold {{ $isError ? 'bg-red-500' : 'bg-green-500' }} transition-all duration-500 ease-in-out transform opacity-0 -translate-y-4">
        <span id="toast-message">{{ $toastMessage }}</span>
    </div>
    <script>
        (function () {
            const toast = document.getElementById('toast-notification');
            if (toast) {
                requestAnimationFrame(() => {
                    toast.classList.remove('opacity-0', '-translate-y-4');
                });
                setTimeout(() => {
                    toast.classList.add('opacity-0', '-translate-y-4');
                    toast.addEventListener('transitionend', () => toast.remove(), { once: true });
                }, 3000);
            }
        })();
    </script>
@endif

<script src="{{ asset('js/resetInputFormCursos.js') }}"></script>
<script src="{{ asset('js/selectionPeriodos.js') }}"></script>
<script src="{{ asset('js/graficoDisciplinasCurso.js') }}"></script>
<script src="{{ asset('js/tabsManager_Disciplinas.js') }}"></script>

<!-- SCRIPT PARA O GRÁFICO -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        Chart.register(ChartDataLabels);
        const ctx = document.getElementById('graficoDisciplinasPorCurso');
        if (ctx) {
            const labels = @json($labelsDisciplinasPorCurso);
            const data = @json($dataDisciplinasPorCurso);
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Nº de Disciplinas',
                        data: data,
                        backgroundColor: ['rgba(39, 39, 39, 0.8)', 'rgba(82, 82, 82, 0.8)', 'rgba(115, 115, 115, 0.8)', 'rgba(163, 163, 163, 0.8)', 'rgba(212, 212, 212, 0.8)'],
                        borderColor: '#ffffff',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { position: 'right' },
                        datalabels: {
                            formatter: (value) => value,
                            color: '#ffffff',
                            font: { weight: 'bold', size: 14 }
                        }
                    }
                }
            });
        }
    });
</script>

<!-- SCRIPT PARA O MODAL -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('detailsModal');
        if (!modal) return;
        const closeModalBtn = document.getElementById('closeModalBtn');
        const openModalBtns = document.querySelectorAll('.view-disciplina-details-btn');
        const spans = {
            id: document.getElementById('modal-disciplina-id'),
            nome: document.getElementById('modal-disciplina-nome'),
            curso: document.getElementById('modal-disciplina-curso'),
            carga: document.getElementById('modal-disciplina-carga'),
            tipo: document.getElementById('modal-disciplina-tipo'),
            periodo: document.getElementById('modal-disciplina-periodo'),
            status: document.getElementById('modal-disciplina-status'),
            descricao: document.getElementById('modal-disciplina-descricao'),
            createdAt: document.getElementById('modal-disciplina-createdAt'),
            updatedAt: document.getElementById('modal-disciplina-updatedAt')
        };
        const formatarData = (dataString) => {
            if (!dataString) return 'N/A';
            return new Date(dataString).toLocaleDateString('pt-BR', { day: '2-digit', month: '2-digit', year: 'numeric', hour: '2-digit', minute: '2-digit' });
        };
        openModalBtns.forEach(button => {
            button.addEventListener('click', async function () {
                modal.classList.remove('hidden');
                spans.id.textContent = 'Carregando...';
                try {
                    const response = await fetch(this.dataset.url);
                    if (!response.ok) throw new Error('Falha ao carregar dados.');
                    const disciplina = await response.json();
                    spans.id.textContent = disciplina.id;
                    spans.nome.textContent = disciplina.nomeDisciplina;
                    spans.curso.textContent = disciplina.curso ? disciplina.curso.nomeCurso : 'N/A';
                    spans.carga.textContent = `${disciplina.cargaDisciplina} horas`;
                    spans.tipo.textContent = disciplina.tipoDisciplina;
                    spans.periodo.textContent = disciplina.periodoDisciplina ? `${disciplina.periodoDisciplina}º Período` : 'N/A';
                    spans.descricao.textContent = disciplina.descricaoDisciplina || 'Nenhuma descrição.';
                    spans.createdAt.textContent = formatarData(disciplina.created_at);
                    spans.updatedAt.textContent = formatarData(disciplina.updated_at);
                    spans.status.innerHTML = disciplina.statusDisciplina.toLowerCase() === 'ativa' ? `<span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Ativa</span>` : `<span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Inativa</span>`;
                } catch (error) {
                    spans.nome.textContent = 'Erro ao carregar dados.';
                }
            });
        });
        const closeModal = () => modal.classList.add('hidden');
        closeModalBtn.addEventListener('click', closeModal);
        modal.addEventListener('click', (e) => (e.target === modal) && closeModal());
        document.addEventListener('keydown', (e) => (e.key === "Escape") && closeModal());
    });
</script>
</body>
</html>
