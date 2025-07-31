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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=history_edu"/>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet"/>
    <title>Cursos - Instituição</title>
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
    <style>

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
        <h1 class="text-2xl font-bold mb-5"><i class="bi bi-award"></i> Cursos</h1>
        <p>Aqui você pode gerenciar os Cursos cadastrados em sua Instituição de Ensino.</p><br>
        <div class="flex">
            <div class="bg-white rounded-xl shadow-2xl poppins-regular w-1/2 mr-5">
                <div class="px-6 py-5">
                    <h3 class="text-xl font-bold text-[#272727]"><i class="bi bi-award"></i> Informações Gerais</h3>
                    <br>
                    <div class="flex justify-between">
                        <h1><i class="bi bi-award"></i> Cursos Cadastrados</h1>
                        <h1 class="text-lg font-bold text-[#272727]">{{ $totalCursos }}</h1>
                    </div>
                    <br><br>
                    <div class="flex justify-between ml-5">
                        <h1><i class="bi bi-check-circle"></i> Cursos Ativos</h1>
                        <h1 class="text-lg font-bold text-[#272727]">{{ $totalAtivos }}</h1>
                    </div>
                    <br>
                    <div class="flex justify-between ml-5">
                        <h1><i class="bi bi-ban"></i> Cursos Inativos</h1>
                        <h1 class="text-lg font-bold text-[#272727]">{{ $totalInativos }}</h1>
                    </div>
                    <br><br>
                    <h3 class="text-xl font-bold text-[#272727]"><i class="bi bi-filetype-pdf"></i> Relatórios</h3>
                    <br>
                    <div class="flex justify-center">
                        <a href="{{ route('reports.cursos', ['status' => 'todos']) }}"
                           class="inline-block bg-[#272727] text-white font-semibold py-2 px-5 rounded-lg shadow hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-opacity-75 transition-colors content-center mr-5">
                            <i class="bi bi-file-earmark-text-fill"></i> Todos
                        </a>
                        <a href="{{ route('reports.cursos', ['status' => 'ativos']) }}"
                           class="inline-block bg-[#272727] text-white font-semibold py-2 px-5 rounded-lg shadow hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-opacity-75 transition-colors content-center mr-5">
                            <i class="bi bi-file-earmark-check-fill"></i> Cursos Ativos
                        </a>
                        <a href="{{ route('reports.cursos', ['status' => 'inativos']) }}"
                           class="inline-block bg-[#272727] text-white font-semibold py-2 px-5 rounded-lg shadow hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-opacity-75 transition-colors content-center">
                            <i class="bi bi-file-earmark-minus-fill"></i> Cursos Inativos
                        </a>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-2xl poppins-regular w-1/2">
                <div class="px-6 py-5">
                    <h3 class="text-xl font-bold text-[#272727]"><i class="bi bi-bar-chart-line"></i> Cursos por Nível
                    </h3>
                    <br>
                    <canvas id="graficoNiveis" width="400" height="200"></canvas>
                    <script>
                        const labels = @json($labelsNiveis);
                        const data = {
                            labels: labels,
                            datasets: [{
                                label: 'Número de Cursos',
                                data: @json($dataNiveis),
                                backgroundColor: [
                                    'rgba(54, 62, 82, 0.8)',   // Cinza ardósia escuro
                                    'rgba(87, 99, 132, 0.8)',  // Cinza azulado
                                    'rgba(120, 136, 182, 0.8)',// Cinza médio
                                    'rgba(153, 173, 232, 0.8)',// Cinza claro
                                    'rgba(186, 210, 255, 0.8)' // Cinza muito claro
                                    // Adicione mais cores se tiver mais níveis
                                ],
                                borderColor: [
                                    'rgba(54, 62, 82, 1)',
                                    'rgba(87, 99, 132, 1)',
                                    'rgba(120, 136, 182, 1)',
                                    'rgba(153, 173, 232, 1)',
                                    'rgba(186, 210, 255, 1)'
                                ],
                                borderWidth: 1
                            }]
                        };
                        const config = {
                            type: 'bar',
                            data: data,
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        ticks: { // <-- A configuração vai aqui dentro
                                            stepSize: 1 // <-- ESTA É A LINHA QUE RESOLVE O PROBLEMA DOS NUMEROS DECIMAIS
                                        }
                                    }
                                }
                            },
                        };

                        const graficoNiveis = new Chart(
                            document.getElementById('graficoNiveis'),
                            config
                        );
                    </script>
                </div>
            </div>
        </div>
        <br>
        <div class="bg-white rounded-xl shadow-2xl poppins-regular">
            <div class="px-6 py-5">
                <h3 class="text-xl font-bold text-[#272727]"><i class="bi bi-plus-square"></i> Cadastrar Curso</h3>
                <br>
                <h2 class="text-md font-bold text-gray-800 mb-4"><i class="bi bi-award"></i> Dados do Curso</h2>
                <div>
                    <form action="{{ route('instituicao.cursos.store') }}" method="POST" id="formCurso">
                        @csrf
                        <div class="flex">
                            <!-- Nome -->
                            <div class="mb-4 w-3/5 mr-5">
                                <label class="block text-[#272727] text-sm font-bold mb-2" for="nomeCurso"><i
                                        class="bi bi-alphabet"></i> Nome<span class="text-red-800">*</span></label>
                                <input
                                    type="text"
                                    name="nomeCurso"
                                    id="nomeCurso"
                                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-600"
                                    placeholder="Ex.: Técnico em Informática, Ensino Médio, etc."
                                    required
                                >
                            </div>
                            <!-- Nível -->
                            <div class="mb-4 w-1/5 mr-percent-1">
                                <label class="block text-[#272727] text-sm font-bold mb-2" for="nivelCurso"><i
                                        class="bi bi-bar-chart-steps"></i> Nível<span
                                        class="text-red-800">*</span></label>
                                <select name="nivelCurso" id="nivelCurso"
                                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-600"
                                        required>
                                    <option value="" disabled selected>Selecione um Nível</option>
                                    <option value="Ensino Fundamental">Ensino Fundamental</option>
                                    <option value="Ensino Médio">Ensino Médio</option>
                                    <option value="Técnico">Técnico</option>
                                    <option value="Superior">Superior</option>
                                    <option value="Pós-Graduação">Pós-Graduação</option>
                                </select>
                            </div>
                            <div class="w-full md:w-1/4 px-2 mb-4">
                                <label for="periodosCurso" class="block text-sm font-bold text-[#272727] mb-2">Qtd. de Períodos</label>
                                <input
                                    type="number"
                                    name="periodosCurso"
                                    id="periodosCurso"
                                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-600"
                                    placeholder="Ex: 8 (semestres) ou 3 (anos)"
                                    value="{{ old('periodosCurso', $curso->periodosCurso ?? '') }}"
                                    required
                                    min="1"
                                >
                            </div>
                        </div>

                        <div class="flex">
                            <div class="mb-4 w-full">
                                <label class="block text-[#272727] text-sm font-bold mb-2" for="nivelCurso"><i
                                        class="bi bi-bar-chart-steps"></i> Descrição (Max. 200 caracteres)</label>
                                <textarea
                                    name="descricaoCurso"
                                    id="descricaoCurso"
                                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-600"
                                    placeholder="Descreva o curso, suas características e objetivos."
                                    rows="5"
                                    maxlength="200"
                                    style="resize: none"
                                ></textarea>
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <button type="button" id="btnLimparCampos"
                                    class="cursor-pointer bg-gray-300 hover:bg-red-200 text-[#272727] py-2 px-4 rounded-lg mr-5">
                                <i class="bi bi-eraser-fill"></i> Limpar Campos
                            </button>
                            <button type="submit"
                                    class="cursor-pointer bg-[#272727] hover:bg-gray-600 text-white py-2 px-4 rounded-lg">
                                <i class="bi bi-floppy"></i> Salvar Curso
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <br>
        {{-- Você pode colocar esta seção abaixo do seu formulário ou dos relatórios --}}
        <div class="bg-white rounded-xl shadow-2xl poppins-regular">
            <h2 class="text-xl font-bold text-[#272727] mb-4 px-6 py-5"><i class="bi bi-table"></i> Lista de Cursos
                Cadastrados</h2>
            <div class="overflow-x-auto px-6">
                <div class="mb-4">
                    <!-- Formulário de Busca -->
                    <label class="block text-[#272727] text-sm font-bold mb-2" for="nivelCurso"><i
                            class="bi bi-bar-chart-steps"></i> Busca Avançada</label>
                    <form action="{{ route('instituicao.cursos.create') }}" method="GET"
                          class="flex items-center gap-2">
                        <div class="relative w-full">
                            <input
                                type="text"
                                name="busca"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-600"
                                placeholder="Pesquisar por nome do curso..."
                                value="{{ request('busca') }}"
                            >
                        </div>
                        <button type="submit"
                                class="bg-[#272727] text-white font-semibold py-2 px-4 rounded-lg shadow hover:bg-gray-600 transition-colors">
                            <i class="bi bi-search"></i>
                        </button>
                        {{-- Link para limpar a busca --}}
                        @if(request('busca'))
                            <a href="{{ route('instituicao.cursos.create') }}"
                               class="cursor-pointer bg-gray-300 hover:bg-red-200 text-[#272727] py-2 px-4 rounded-lg">
                                <i class="bi bi-eraser-fill"></i>
                            </a>
                        @endif
                    </form>
                </div>
                <br>
                <table class="min-w-full bg-white">
                    <thead class="bg-[#272727] text-white">
                    <tr>
                        <th class="py-3 px-4 text-left text-sm font-semibold uppercase">
                            {{-- CORREÇÃO: A rota foi alterada de '.create' para '.index' --}}
                            <a href="{{ route('instituicao.cursos.create', request()->merge(['sortBy' => 'id', 'direction' => ($sortBy == 'id' && $direction == 'asc') ? 'desc' : 'asc'])->all()) }}" class="flex items-center gap-2 group">
                                <i class="bi bi-hash"></i>
                                <span>ID</span>
                                @if($sortBy == 'id')
                                    <i class="bi {{ $direction == 'asc' ? 'bi-arrow-up' : 'bi-arrow-down' }}"></i>
                                @else
                                    {{-- Ícone neutro para colunas inativas --}}
                                    <i class="bi bi-arrow-down-up text-gray-400 group-hover:text-white transition-colors"></i>
                                @endif
                            </a>
                        </th>
                        <th class="py-3 px-4 text-left text-sm font-semibold uppercase">
                            <a href="{{ route('instituicao.cursos.create', request()->merge(['sortBy' => 'nomeCurso', 'direction' => ($sortBy == 'nomeCurso' && $direction == 'asc') ? 'desc' : 'asc'])->all()) }}" class="flex items-center gap-2 group">
                                <i class="bi bi-alphabet"></i>
                                <span>Nome do Curso</span>
                                @if($sortBy == 'nomeCurso')
                                    <i class="bi {{ $direction == 'asc' ? 'bi-arrow-up' : 'bi-arrow-down' }}"></i>
                                @else
                                    <i class="bi bi-arrow-down-up text-gray-400 group-hover:text-white transition-colors"></i>
                                @endif
                            </a>
                        </th>
                        <th class="py-3 px-4 text-left text-sm font-semibold uppercase">
                            <a href="{{ route('instituicao.cursos.create', request()->merge(['sortBy' => 'nivelCurso', 'direction' => ($sortBy == 'nivelCurso' && $direction == 'asc') ? 'desc' : 'asc'])->all()) }}" class="flex items-center gap-2 group">
                                <i class="bi bi-bar-chart-steps"></i>
                                <span>Nível</span>
                                @if($sortBy == 'nivelCurso')
                                    <i class="bi {{ $direction == 'asc' ? 'bi-arrow-up' : 'bi-arrow-down' }}"></i>
                                @else
                                    <i class="bi bi-arrow-down-up text-gray-400 group-hover:text-white transition-colors"></i>
                                @endif
                            </a>
                        </th>
                        <th class="py-3 px-4 text-left text-sm font-semibold uppercase">
                            <a href="{{ route('instituicao.cursos.create', request()->merge(['sortBy' => 'statusCurso', 'direction' => ($sortBy == 'statusCurso' && $direction == 'asc') ? 'desc' : 'asc'])->all()) }}" class="flex items-center gap-2 group">
                                <i class="bi bi-toggles2"></i>
                                <span>Status</span>
                                @if($sortBy == 'statusCurso')
                                    <i class="bi {{ $direction == 'asc' ? 'bi-arrow-up' : 'bi-arrow-down' }}"></i>
                                @else
                                    <i class="bi bi-arrow-down-up text-gray-400 group-hover:text-white transition-colors"></i>
                                @endif
                            </a>
                        </th>
                        <th class="py-3 px-4 text-center text-sm font-semibold uppercase">
                            <i class="bi bi-sliders"></i> Ações
                        </th>
                    </tr>
                    </thead>
                    <tbody class="text-gray-700">
                    @forelse ($cursos as $curso)
                        <tr class="border-b border-gray-200 hover:bg-gray-200">
                            <td class="py-3 px-4">{{ $curso->id }}</td>
                            <td class="py-3 px-4">{{ $curso->nomeCurso }}</td>
                            <td class="py-3 px-4">{{ $curso->nivelCurso }}</td>
                            <td class="py-3 px-4">
                                {{-- Badge de status com cor condicional --}}
                                @if ($curso->statusCurso == 'ativo')
                                    <span
                                        class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full">● Ativo</span>
                                @else
                                    <span
                                        class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full">● Inativo</span>
                                @endif
                            </td>
                            <td class="py-3 px-4 text-center">
                                <div class="flex justify-center items-center gap-2">
                                    <button
                                        type="button"
                                        class="text-gray-600 hover:text-gray-900 cursor-pointer view-details-btn"
                                        title="Ver Detalhes"
                                        data-curso="{{ json_encode($curso) }}" {{-- Passa todos os dados do curso em formato JSON --}}
                                    >
                                        <i class="bi bi-eye-fill text-lg"></i>
                                    </button>
                                    {{-- Botão de Alterar --}}
                                    <a href="{{ route('cursos.edit', $curso->id) }}"
                                       class="text-blue-600 hover:text-blue-900 cursor-pointer" title="Alterar Curso">
                                        <i class="bi bi-pencil-square text-lg"></i>
                                    </a>
                                    {{-- Botão de Excluir (dentro de um formulário por segurança) --}}
                                    <form action="{{ route('cursos.destroy', $curso ->id) }}" method="POST"
                                          onsubmit="return confirm('Tem certeza que deseja excluir este curso?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 cursor-pointer"
                                                title="Excluir Curso">
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
                {{-- Modal de Detalhes do Curso --}}
                <div id="detailsModal"
                     class="fixed hidden inset-0 bg-black/30 backdrop-blur-sm z-40 flex items-center justify-center p-4 transition-opacity duration-300">
                    <div
                        class="relative mx-auto p-5 w-auto min-w-[320px] max-w-[95%] md:max-w-5xl flex flex-col max-h-[90vh] shadow-lg rounded-md bg-white">
                        <div class="flex justify-between items-start pb-3">
                            <h3 class="text-xl font-bold text-[#272727]"><i class="bi bi-info-circle-fill"></i> Detalhes
                                do Curso</h3>
                            <button id="closeModalBtn" class="text-black cursor-pointer text-2xl leading-none">&times;
                            </button>
                        </div>
                        <div class="flex">
                            <div class="flex w-1/2 mr-percent-5">
                                <div class="mt-4 space-y-5 poppins-regular text-justify w-full">
                                    <div class="flex justify-between">
                                        <p><strong><i class="bi bi-hash"></i> ID:</strong> <span id="modal-id"></span></p>
                                        <p><strong><i class="bi bi-toggles2"></i> Status:</strong> <span id="modal-statusCurso"></span></p>
                                    </div>
                                    <p><strong><i class="bi bi-alphabet"></i> Nome:</strong> <span id="modal-nomeCurso"></span></p>
                                    <div class="flex justify-between">
                                        <p><strong><i class="bi bi-bar-chart-steps"></i> Nível:</strong> <span id="modal-nivelCurso"></span></p>
                                        <p><strong><i class="bi bi-clock"></i> CH Toral:</strong> <span id="modal-curso-carga-total" class="font-regular text-[#272727]"></span></p>
                                    </div>
                                    {{-- ... Descrição, Status, etc. ... --}}

                                </div>
                            </div>
                            <div class="flex w-1/2">
                                <div class="mt-4 space-y-4 poppins-regular">
                                    <h1><strong><i class="bi bi-backpack2"></i> Alunos Matriculados:</strong> 00</h1>
                                    <p><strong><i class="bi bi-calendar3"></i> Data de Criação:</strong> <span id="modal-createdAt"></span></p>
                                    <p><strong><i class="bi bi-calendar3"></i> Última Atualização:</strong> <span id="modal-updatedAt"></span></p>
                                    <p><strong><i class="bi bi-calculator"></i> Quantidade de Período(s):</strong> <span id="modal-curso-periodos"></span></p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <p class="text-justify"><strong><i class="bi bi-card-text"></i> Descrição:</strong> <span id="modal-descricaoCurso"></span></p>
                        {{-- Disciplinas do Curso --}}
                            <div class="mt-4 pt-4">
                                <h4 class="font-bold text-md text-[#272727] mb-2"><i class="bi bi-journal-bookmark"></i> Disciplinas do Curso:</h4>
                                <div id="modal-disciplinas-container" class="border rounded-lg max-h-60 overflow-y-auto bg-gray-50">
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            {{-- Links de Paginação --}}
            <div class="mt-6 px-6 py-5 font-poppins-regular">
                {{-- Verifica se há cursos para paginar --}}
                {{ $cursos->links() }}
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
<script src="{{ asset('js/modalDetalhesCurso.js') }}"></script>
</body>
</html>
