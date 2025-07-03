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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> {{-- Biblioteca para Gerar Gráficos  --}}
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script> {{-- Plugin para adionar detalhes na Biblioteca de Gráficos  --}}
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
                        <a href="{{ route('reports.disciplinas', ['status' => 'todas']) }}"
                           class="inline-block bg-[#272727] text-white font-semibold py-2 px-5 rounded-lg shadow hover:bg-gray-600 transition-colors">
                            <i class="bi bi-file-earmark-text-fill"></i> Todas
                        </a>

                        <a href="{{ route('reports.disciplinas', ['status' => 'ativas']) }}"
                           class="inline-block bg-[#272727] text-white font-semibold py-2 px-5 rounded-lg shadow hover:bg-gray-600 transition-colors ml-percent-5">
                            <i class="bi bi-file-earmark-check-fill"></i> Disciplinas Ativas
                        </a>

                        <a href="{{ route('reports.disciplinas', ['status' => 'inativas']) }}"
                           class="inline-block bg-[#272727] text-white font-semibold py-2 px-5 rounded-lg shadow hover:bg-gray-600 transition-colors ml-percent-5">
                            <i class="bi bi-file-earmark-minus-fill"></i> Disciplinas Inativas
                        </a>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-lg w-full md:w-1/2">
                <div class="px-6 py-5">
                    <h3 class="text-xl font-bold text-[#272727]"><i class="bi bi-bar-chart-line"></i> Disciplinas por Curso</h3>
                    <br>
                    {{-- Canvas para o único gráfico que vamos exibir --}}
                    <div class="relative h-64 md:h-80"> {{-- Adicionado 'relative' e altura para responsividade --}}
                        <canvas id="graficoDisciplinasPorCurso"></canvas>
                    </div>
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
                                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-600"
                                    placeholder="Ex.: Matemática III, Algoritmos e Estruturas de Dados"
                                    value="{{ old('nomeDisciplina') }}"
                                    required
                                >
                            </div>
                            <div class="mb-4 w-full md:w-1/3 px-2">
                                <label class="block text-[#272727] text-sm font-bold mb-2" for="cursoDisciplina">
                                    <i class="bi bi-award"></i> Curso<span class="text-red-800">*</span>
                                </label>
                                <select name="cursoDisciplina" id="cursoDisciplina" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-600" required>
                                    <option value="" disabled selected>Selecione um Curso</option>
                                    @foreach ($cursos as $curso)
                                        <option
                                            value="{{ $curso->id }}"
                                            data-periodos="{{ $curso->periodosCurso }}"
                                            {{ old('cursoDisciplina') == $curso->id ? 'selected' : '' }}
                                        >
                                            {{ $curso->id }} - {{ $curso->nomeCurso }}
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
                                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-600"
                                    placeholder="Ex.: 120"
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
                                <label class="block text-[#272727] text-sm font-bold mb-2" for="periodoDisciplina">
                                    <i class="bi bi-hash"></i> Período/Ano<span class="text-red-800">*</span>
                                </label>
                                <select name="periodoDisciplina" id="periodoDisciplina" class="w-full px-3 py-2 border rounded-lg bg-gray-200 cursor-not-allowed" required disabled>
                                    <option value="">Disponível após a seleção de curso</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-4 w-full">
                            <div class="flex justify-between items-center mb-2">
                                <label class="block text-[#272727] text-sm font-bold" for="ementaDisciplina">
                                    <i class="bi bi-paperclip"></i> Ementa da Disciplina (PDF ou DOCX)
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
                                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-600"
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

                    {{-- Lembrete: O script para o select dinâmico de períodos deve estar nesta mesma página --}}
                </div>
            </div>
        <br>

        </div>
        <br>
        <div class="bg-white rounded-xl shadow-2xl poppins-regular">
            <h2 class="text-xl font-bold text-[#272727] mb-4 px-6 py-5"><i class="bi bi-table"></i> Lista de Disciplinas Cadastradas</h2>
            <div class="overflow-x-auto px-6">
                <div class="mb-4">
                    <!-- Formulário de Busca -->
                    <label class="block text-[#272727] text-sm font-bold mb-2" for="nivelCurso"><i class="bi bi-bar-chart-steps"></i> Busca Avançada</label>
                    <form action=" " method="GET" class="flex items-center gap-2">
                        <div class="relative w-full">
                            <input
                                type="text"
                                name="busca"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-600"
                                placeholder="Pesquisar por nome do curso..."
                                value="{{ request('busca') }}"
                            >
                        </div>
                        <button type="submit" class="bg-[#272727] text-white font-semibold py-2 px-4 rounded-lg shadow hover:bg-gray-600 transition-colors">
                            <i class="bi bi-search"></i>
                        </button>
                        {{-- Link para limpar a busca --}}
                        @if(request('busca'))
                            <a href="{{ route('instituicao.disciplinas_create') }}" class="cursor-pointer bg-gray-300 hover:bg-red-200 text-[#272727] py-2 px-4 rounded-lg">
                                <i class="bi bi-eraser-fill"></i>
                            </a>
                        @endif
                    </form>
                </div>
                <br>
                <table class="min-w-full bg-white">
                    <thead class="bg-[#272727] text-white">
                    <tr>
                        <th class="py-3 px-4 text-left text-sm font-semibold uppercase"><i class="bi bi-hash"></i> ID</th>
                        <th class="py-3 px-4 text-left text-sm font-semibold uppercase"><i class="bi bi-alphabet"></i> Nome da Disciplina</th>
                        <th class="py-3 px-4 text-left text-sm font-semibold uppercase"><i class="bi bi-clock"></i> Carga Horária</th>
                        <th class="py-3 px-4 text-left text-sm font-semibold uppercase"><i class="bi bi-award"></i> Curso</th>
                        <th class="py-3 px-4 text-left text-sm font-semibold uppercase"><i class="bi bi-toggles2"></i> Status</th>
                        <th class="py-3 px-4 text-center text-sm font-semibold uppercase"><i class="bi bi-sliders"></i> Ações</th>
                    </tr>
                    </thead>
                    <tbody class="text-gray-700">
                    @forelse ($disciplinas as $disciplina)
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="py-3 px-4">{{ $disciplina->id }}</td>
                            <td class="py-3 px-4">{{ $disciplina->nomeDisciplina }}</td>
                            <td class="py-3 px-4">{{ $disciplina->cargaDisciplina }} horas</td>
                            <td class="py-3 px-4">{{ $disciplina->curso->nomeCurso }}</td>
                            <td class="py-3 px-4">
                                {{-- Badge de status com cor condicional --}}
                                @if ($disciplina->statusDisciplina == 'Ativa')
                                    <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full">Ativo</span>
                                @else
                                    <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full">Inativo</span>
                                @endif
                            </td>
                            <td class="py-3 px-4 text-center">
                                <div class="flex justify-center items-center gap-2">
                                    <button
                                        type="button"
                                        class="text-gray-600 hover:text-blue-900 cursor-pointer view-disciplina-details-btn"
                                        title="Ver Detalhes"
                                        data-url="{{ route('disciplinas.data', $disciplina->id) }}"
                                    >
                                        <i class="bi bi-eye-fill text-lg"></i>
                                    </button>
                                    @if ($disciplina->ementaDisciplina)
                                        <a  href="{{ Storage::url($disciplina->ementaDisciplina) }}"
                                            download
                                            class="text-green-600 hover:text-green-900"
                                            title="Baixar Ementa">
                                            <i class="bi bi-file-earmark-arrow-down-fill text-lg"></i>
                                        </a>
                                    @endif
                                    {{-- Botão de Alterar --}}
                                    <a href="{{ route('disciplinas.edit', $disciplina->id) }}" class="text-blue-600 hover:text-blue-900 cursor-pointer" title="Alterar Disciplina">
                                        <i class="bi bi-pencil-square text-lg"></i>
                                    </a>
                                    {{-- Botão de Excluir (dentro de um formulário por segurança) --}}
                                    <form action="{{ route('disciplina.destroy', $disciplina->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta disciplina?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 cursor-pointer" title="Excluir Disciplina">
                                            <i class="bi bi-trash-fill text-lg"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-4 px-4 text-center text-gray-500">
                                Nenhum curso cadastrado ainda.
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            {{-- Modal - Detalhes da DIsciplina --}}
            <div id="detailsModal" class="fixed hidden inset-0 bg-black/30 backdrop-blur-sm z-40 flex items-center justify-center p-4 transition-opacity duration-300">
                <div class="relative mx-auto p-5 w-auto min-w-[320px] max-w-[95%] md:max-w-5xl flex flex-col max-h-[90vh] shadow-lg rounded-md bg-white">
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
                                <p><strong><i class="bi bi-clock"></i> Carga Horária: </strong> <span id="modal-disciplina-carga" class="font-regular text-[#272727]"></span></p>
                            </div>
                        </div>
                        <div class="w-full md:w-1/2 md:ml-4">
                            <div class="mt-4 space-y-4 poppins-regular">
                                <p><strong><i class="bi bi-bookmark"></i> Tipo: </strong> <span id="modal-disciplina-tipo"></span></p>
                                <p><strong><i class="bi bi-hash"></i> Período: </strong> <span id="modal-disciplina-periodo"></span></p>

                                <p><strong><i class="bi bi-people-fill"></i> Alunos Matriculados: </strong> <span id="modal-disciplina-alunos">A implementar</span></p>
                                <p><strong><i class="bi bi-calendar3"></i> Data de Criação:</strong> <span id="modal-disciplina-createdAt"></span></p>
                                <p><strong><i class="bi bi-calendar3"></i> Última Atualização:</strong> <span id="modal-disciplina-updatedAt"></span></p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 pt-4">
                        <p class="text-justify"><strong><i class="bi bi-card-text"></i> Descrição:</strong> <span id="modal-disciplina-descricao"></span></p>
                    </div>
                    <div class="mt-4 pt-4 text-xs text-gray-500">

                    </div>
                </div>
            </div>
            {{-- Links de Paginação --}}
            <div class="mt-6 px-6 py-5 font-poppins-regular">
                {{-- Verifica se há cursos para paginar --}}
                {{ $disciplinas->links() }}
            </div>
        </div>
        <br>
    </div>
</div>
        @if (session('success') || session('error'))
            @php
                $toastMessage = session('success') ?? session('error');
                $isError = session()->has('error');
            @endphp

            <div
                    id="toast-notification"
                    class="
            fixed top-4 right-4 z-50 {{-- <-- MUDANÇA AQUI --}}
            w-full max-w-xs p-4 rounded-lg shadow-lg
            text-white poppins-semibold
            {{ $isError ? 'bg-red-500' : 'bg-green-500' }}

            {{-- Classes de animação --}}
            transition-all duration-500 ease-in-out
            transform
            opacity-0
            -translate-y-4 {{-- <-- MUDANÇA NA ANIMAÇÃO AQUI --}}
        "
            >
                <span id="toast-message">{{ $toastMessage }}</span>
            </div>

            <script>
                (function () {
                    const message = @json($toastMessage);
                    const toastElement = document.getElementById('toast-notification');
                    const messageElement = document.getElementById('toast-message');

                    if (!toastElement || !messageElement || !message) {
                        return;
                    }

                    messageElement.textContent = message;

                    // ANIMAÇÃO DE ENTRADA
                    requestAnimationFrame(() => {
                        // Remove as classes que escondem o elemento.
                        toastElement.classList.remove('opacity-0', '-translate-y-4'); // <-- MUDANÇA AQUI
                    });

                    // ANIMAÇÃO DE SAÍDA (após 3 segundos)
                    setTimeout(() => {
                        // Adiciona as classes para esconder o elemento novamente.
                        toastElement.classList.add('opacity-0', '-translate-y-4'); // <-- MUDANÇA AQUI

                        toastElement.addEventListener('transitionend', () => {
                            toastElement.remove();
                        }, {once: true});

                    }, 3000); // 3 segundos
                })();
            </script>
        @endif
        <script src="{{ asset('js/resetInputFormCursos.js') }}"></script>
        <script src="{{ asset('js/selectionPeriodos.js') }}"></script>
        <script src="{{ asset('js/graficoDisciplinasCurso.js') }}"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {

                // --- 1. REGISTRAR O PLUGIN GLOBALMENTE ---
                // Esta linha "ativa" o plugin para que o Chart.js possa usá-lo.
                // Coloque-a no início do seu script.
                Chart.register(ChartDataLabels);

                // --- CÓDIGO PARA O GRÁFICO DE DISCIPLINAS POR CURSO ---
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
                                backgroundColor: [
                                    'rgba(39, 39, 39, 0.8)',      // Sua cor principal: #272727
                                    'rgba(82, 82, 82, 0.8)',      // Cinza Chumbo
                                    'rgba(115, 115, 115, 0.8)',    // Cinza Médio-Escuro
                                    'rgba(163, 163, 163, 0.8)',    // Cinza Médio
                                    'rgba(212, 212, 212, 0.8)',    // Cinza Claro
                                    'rgba(64, 64, 64, 0.8)',
                                    'rgba(100, 100, 100, 0.8)',
                                    'rgba(140, 140, 140, 0.8)',
                                    'rgba(180, 180, 180, 0.8)',
                                    'rgba(220, 220, 220, 0.8)',
                                    'rgba(45, 45, 45, 0.8)',
                                    'rgba(125, 125, 125, 0.8)',
                                    'rgba(170, 170, 170, 0.8)',
                                    'rgba(200, 200, 200, 0.8)',
                                    'rgba(245, 245, 245, 0.8)'
                                ],
                                borderColor: '#ffffff',
                                borderWidth: 2
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: {
                                    position: 'right',
                                },
                                title: {
                                    display: false,
                                    text: 'Proporção de Disciplinas por Curso'
                                },
                                // --- 2. CONFIGURAR O PLUGIN PARA ESTE GRÁFICO ---
                                datalabels: {
                                    // Formata o número que aparece no gráfico
                                    formatter: (value, context) => {
                                        // Retorna apenas o valor numérico da fatia
                                        return value;
                                    },
                                    // Define a cor do número
                                    color: '#ffffff', // Branco, para ter um bom contraste com as fatias coloridas
                                    font: {
                                        weight: 'bold', // Deixa o número em negrito
                                        size: 14 // Tamanho da fonte
                                    }
                                }
                            }
                        }
                    });
                }
            });
        </script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('detailsModal');
        if (!modal) return;

        const closeModalBtn = document.getElementById('closeModalBtn');
        const openModalBtns = document.querySelectorAll('.view-disciplina-details-btn');

        // Seleciona todos os spans que vamos preencher
        const modalId = document.getElementById('modal-disciplina-id');
        const modalNome = document.getElementById('modal-disciplina-nome');
        const modalCurso = document.getElementById('modal-disciplina-curso');
        const modalCarga = document.getElementById('modal-disciplina-carga');
        const modalTipo = document.getElementById('modal-disciplina-tipo');
        const modalPeriodo = document.getElementById('modal-disciplina-periodo');
        const modalStatus = document.getElementById('modal-disciplina-status');
        const modalDescricao = document.getElementById('modal-disciplina-descricao');
        const modalCreatedAt = document.getElementById('modal-disciplina-createdAt');
        const modalUpdatedAt = document.getElementById('modal-disciplina-updatedAt');

        function formatarData(dataString) {
            if (!dataString) return 'N/A';
            const data = new Date(dataString);
            return data.toLocaleDateString('pt-BR', { day: '2-digit', month: '2-digit', year: 'numeric', hour: '2-digit', minute: '2-digit' });
        }

        openModalBtns.forEach(button => {
            button.addEventListener('click', async function () {
                const url = this.dataset.url;

                // Mostra um estado de "carregando" e abre o modal
                modalId.textContent = 'Carregando...';
                // ... pode fazer o mesmo para outros campos ...
                modal.classList.remove('hidden');

                try {
                    const response = await fetch(url);
                    if (!response.ok) throw new Error('Falha ao carregar dados da disciplina.');

                    const disciplina = await response.json();

                    // Preenche o modal com os dados recebidos
                    modalId.textContent = disciplina.id;
                    modalNome.textContent = disciplina.nomeDisciplina;
                    // Acessa o nome do curso através do relacionamento carregado
                    modalCurso.textContent = disciplina.curso ? disciplina.curso.nomeCurso : 'N/A';
                    modalCarga.textContent = `${disciplina.cargaDisciplina} horas`;
                    modalTipo.textContent = disciplina.tipoDisciplina;
                    modalPeriodo.textContent = disciplina.periodoDisciplina ? `${disciplina.periodoDisciplina}º Período` : 'Não definido';
                    modalDescricao.textContent = disciplina.descricaoDisciplina || 'Nenhuma descrição fornecida.';
                    modalCreatedAt.textContent = formatarData(disciplina.created_at);
                    modalUpdatedAt.textContent = formatarData(disciplina.updated_at);

                    // Preenche o badge de status
                    if (disciplina.statusDisciplina.toLowerCase() === 'ativa') {
                        modalStatus.innerHTML = `<span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Ativo</span>`;
                    } else {
                        modalStatus.innerHTML = `<span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Inativo</span>`;
                    }

                } catch (error) {
                    console.error('Erro ao buscar detalhes da disciplina:', error);
                    modalNome.textContent = 'Erro ao carregar dados.';
                }
            });
        });

        // Lógica para fechar o modal
        const closeModal = () => modal.classList.add('hidden');
        closeModalBtn.addEventListener('click', closeModal);
        modal.addEventListener('click', (event) => (event.target === modal) && closeModal());
        document.addEventListener('keydown', (event) => (event.key === "Escape" && !modal.classList.contains('hidden')) && closeModal());
    });
</script>
</body>
</html>
