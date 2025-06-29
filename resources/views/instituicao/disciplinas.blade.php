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
                                        class="text-gray-600 hover:text-gray-900 cursor-pointer view-details-btn"
                                        title="Ver Detalhes"
                                        data-curso="{{ json_encode($disciplina) }}" {{-- Passa todos os dados do curso em formato JSON --}}
                                    >
                                        <i class="bi bi-eye-fill text-lg"></i>
                                    </button>
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
                                    'rgba(39, 39, 39, 0.8)',
                                    'rgba(239, 68, 68, 0.8)',   // Vermelho Forte
                                    'rgba(34, 197, 94, 0.8)',   // Verde Vibrante
                                    'rgba(217, 70, 239, 0.8)',  // Magenta/Fúcsia
                                    'rgba(245, 158, 11, 0.8)',  // Âmbar/Dourado
                                    'rgba(20, 184, 166, 0.8)',  // Verde-água (Teal)
                                    'rgba(99, 102, 241, 0.8)',  // Índigo
                                    'rgba(132, 204, 22, 0.8)',  // Verde Limão
                                    'rgba(14, 165, 233, 0.8)',  // Azul Céu
                                    'rgba(107, 114, 128, 0.8)',
                                    'rgba(54, 162, 235, 0.8)',
                                    'rgba(255, 206, 86, 0.8)',
                                    'rgba(75, 192, 192, 0.8)',
                                    'rgba(153, 102, 255, 0.8)',
                                    'rgba(255, 159, 64, 0.8)'
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
</body>
</html>
