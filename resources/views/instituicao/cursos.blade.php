<!DOCTYPE html>
<html lang="pt-BR" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <style>
        .poppins-thin { font-family: "Poppins", serif; font-weight: 100; }
        .poppins-extralight { font-family: "Poppins", serif; font-weight: 200; }
        .poppins-light { font-family: "Poppins", serif; font-weight: 300; }
        .poppins-regular { font-family: "Poppins", serif; font-weight: 400; }
        .poppins-medium { font-family: "Poppins", serif; font-weight: 500; }
        .poppins-semibold { font-family: "Poppins", serif; font-weight: 600; }
        .poppins-bold { font-family: "Poppins", serif; font-weight: 700; }
        .poppins-extrabold { font-family: "Poppins", serif; font-weight: 800; }
        .poppins-black { font-family: "Poppins", serif; font-weight: 900; }
        .poppins-thin-italic { font-family: "Poppins", serif; font-weight: 100; font-style: italic; }
        .poppins-extralight-italic { font-family: "Poppins", serif; font-weight: 200; font-style: italic; }
        .poppins-light-italic { font-family: "Poppins", serif; font-weight: 300; font-style: italic; }
        .poppins-regular-italic { font-family: "Poppins", serif; font-weight: 400; font-style: italic; }
        .poppins-medium-italic { font-family: "Poppins", serif; font-weight: 500; font-style: italic; }
        .poppins-semibold-italic { font-family: "Poppins", serif; font-weight: 600; font-style: italic; }
        .poppins-bold-italic { font-family: "Poppins", serif; font-weight: 700; font-style: italic; }
        .poppins-extrabold-italic { font-family: "Poppins", serif; font-weight: 800; font-style: italic; }
        .poppins-black-italic { font-family: "Poppins", serif; font-weight: 900; font-style: italic; }
    </style>
    <style type="text/tailwindcss">
        .ml-percent-15 { margin-left: 15%; }
        .ml-percent-5 { margin-left: 5%; }
        .ml-percent-1 { margin-left: 1%; }
        .mr-percent-1 { margin-right: 1%; }
        .mr-percent-5 { margin-right: 5%; }
        .mr-percent-10 { margin-right: 10%; }
        .div-flex { display: flex; }
        .sidebar-transition { transition: transform 0.3s ease-in-out, width 0.3s ease-in-out; }
        .content-transition { transition: margin-left 0.3s ease-in-out; }
    </style>
</head>
<body>
<div class="flex h-screen">
    @include('components._sidebar')
    <div id="main-content" class="flex-1 ml-64 p-10 content-transition poppins-regular bg-gray-50">
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
        <h1 class="text-2xl font-bold mb-2"><i class="bi bi-award"></i> Cursos</h1>
        <p class="mb-6 text-gray-600">Aqui você pode gerenciar os Cursos cadastrados em sua Instituição de Ensino.</p>

        <div class="mb-4 border-b border-gray-200">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" role="tablist">
                <li class="mr-2" role="presentation">
                    <button class="tab-button inline-block p-4 border-b-2 rounded-t-lg cursor-pointer" type="button" role="tab" onclick="openTab(event, 'painel')">
                        <i class="bi bi-grid-1x2-fill mr-1"></i> Painel Principal
                    </button>
                </li>
                <li class="mr-2" role="presentation">
                    <button class="tab-button inline-block p-4 border-b-2 rounded-t-lg cursor-pointer" type="button" role="tab" onclick="openTab(event, 'gerenciamento')">
                        <i class="bi bi-pencil-square mr-1"></i> Gerenciamento
                    </button>
                </li>
                <li class="mr-2" role="presentation">
                    <button class="tab-button inline-block p-4 border-b-2 rounded-t-lg cursor-pointer" type="button" role="tab" onclick="openTab(event, 'relatorios')">
                        <i class="bi bi-file-earmark-text-fill mr-1"></i> Relatórios
                    </button>
                </li>
            </ul>
        </div>

        <div id="tabContent">
            <div id="painel" class="tab-content hidden p-4">
                <div class="flex flex-wrap -mx-2">
                    <div class="w-full md:w-1/2 px-2 mb-4">
                        <!-- O container do card agora é um flex container vertical -->
                        <div class="bg-white rounded-xl shadow-2xl poppins-regular h-full flex flex-col">

                            <!-- Seção principal com as informações (ocupa o espaço necessário) -->
                            <div class="px-6 py-5">
                                <h3 class="text-xl font-bold text-[#272727] mb-4"><i class="bi bi-bar-chart-line-fill"></i> Informações Gerais</h3>

                                <!-- Item Principal: Cursos Cadastrados -->
                                <div class="flex justify-between items-center py-3">
                                    <div class="flex items-center text-gray-700">
                                        <i class="bi bi-award text-lg mr-3"></i>
                                        <span>Cursos Cadastrados</span>
                                    </div>
                                    <span class="text-2xl font-bold text-[#272727] bg-gray-100 px-3 py-1 rounded-lg">{{ $totalCursos }}</span>
                                </div>

                                <!-- Divisória -->
                                <hr class="my-2 border-gray-200">

                                <!-- Sub-itens: Ativos e Inativos -->
                                <div class="pl-6">
                                    <!-- Cursos Ativos -->
                                    <div class="flex justify-between items-center py-2 text-gray-600">
                                        <div class="flex items-center">
                                            <i class="bi bi-check-circle mr-3 text-green-500"></i>
                                            <span>Cursos Ativos</span>
                                        </div>
                                        <span class="text-lg font-semibold text-green-600">{{ $totalAtivos }}</span>
                                    </div>

                                    <!-- Cursos Inativos -->
                                    <div class="flex justify-between items-center py-2 text-gray-600">
                                        <div class="flex items-center">
                                            <i class="bi bi-ban mr-3 text-red-500"></i>
                                            <span>Cursos Inativos</span>
                                        </div>
                                        <span class="text-lg font-semibold text-red-600">{{ $totalInativos }}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Seção de Ação Rápida (empurrada para o final do card) -->
                            <!-- A classe 'mt-auto' faz a mágica de empurrar esta div para baixo -->
                            <div class="mt-auto border-t border-gray-200 bg-gray-50 px-6 py-4 rounded-b-xl">
                                <a href="#" onclick="openTab(event, 'gerenciamento')" class="w-full text-center block bg-[#272727] text-white font-semibold py-2 px-5 rounded-lg shadow hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-opacity-75 transition-colors">
                                    <i class="bi bi-pencil-square"></i> Gerenciar Cursos
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="w-full md:w-1/2 px-2 mb-4">
                        <div class="bg-white rounded-xl shadow-2xl poppins-regular h-full">
                            <div class="px-6 py-5">
                                <h3 class="text-xl font-bold text-[#272727]"><i class="bi bi-bar-chart-line"></i> Cursos por Nível</h3><br>
                                <canvas id="graficoNiveis" width="400" height="200"></canvas>
                                <script>
                                    const labels = @json($labelsNiveis);
                                    const data = {
                                        labels: labels,
                                        datasets: [{
                                            label: 'Número de Cursos',
                                            data: @json($dataNiveis),
                                            backgroundColor: ['rgba(54, 62, 82, 0.8)', 'rgba(87, 99, 132, 0.8)', 'rgba(120, 136, 182, 0.8)', 'rgba(153, 173, 232, 0.8)', 'rgba(186, 210, 255, 0.8)'],
                                            borderColor: ['rgba(54, 62, 82, 1)', 'rgba(87, 99, 132, 1)', 'rgba(120, 136, 182, 1)', 'rgba(153, 173, 232, 1)', 'rgba(186, 210, 255, 1)'],
                                            borderWidth: 1
                                        }]
                                    };
                                    const config = { type: 'bar', data: data, options: { scales: { y: { beginAtZero: true, ticks: { stepSize: 1 } } } } };
                                    const graficoNiveis = new Chart(document.getElementById('graficoNiveis'), config);
                                </script>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div id="gerenciamento" class="tab-content hidden p-4">
                <div class="bg-white rounded-xl shadow-2xl poppins-regular mb-6">
                    <div class="px-6 py-5">
                        <h3 class="text-xl font-bold text-[#272727]"><i class="bi bi-plus-square"></i> Cadastrar Curso</h3><br>
                        <h2 class="text-md font-bold text-gray-800 mb-4"><i class="bi bi-award"></i> Dados do Curso</h2>
                        <div>
                            <form action="{{ route('instituicao.cursos.store') }}" method="POST" id="formCurso" enctype="multipart/form-data">
                                @csrf
                                <div class="flex flex-wrap -mx-2 mb-4">
                                <div class="w-full md:w-1/2 px-2 mb-4 md:mb-0">
                                    <label class="block text-[#272727] text-sm font-bold mb-2" for="nomeCurso"><i class="bi bi-alphabet"></i> Nome do Curso<span class="text-red-800">*</span></label>
                                    <input type="text" name="nomeCurso" id="nomeCurso" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-600" placeholder="Ex.: Técnico em Informática, Ensino Médio, etc." value="{{ old('nomeCurso') }}" required>
                                </div>
                                    <div class="w-full md:w-1/2 px-2 mb-4 md:mb-0">

                                        <!-- Container para o rótulo e o botão de download -->
                                        <div class="flex justify-between items-center mb-2">
                                            <label for="ppcCurso" class="block text-sm font-bold text-[#272727]">
                                                <i class="bi bi-file-earmark-pdf"></i> Projeto Pedagógico do Curso (PPC)<span class="text-red-800">*</span>
                                            </label>

                                            <!-- Botão para baixar o modelo -->
                                            <a href="{{ asset('downloads/modelo_ppc.docx') }}" download
                                               class="text-xs text-[#272727] hover:text-gray-700 hover:underline font-semibold"
                                               title="Baixar um modelo de PPC em branco">
                                                <i class="bi bi-download"></i>
                                                <span>Baixar Modelo</span>
                                            </a>
                                        </div>

                                        <input
                                            type="file"
                                            name="ppcCurso"
                                            id="ppcCurso"
                                            class="block w-full text-sm text-gray-500 border border-gray-300 rounded-lg cursor-pointer file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-[#272727] file:text-white hover:file:bg-gray-700"
                                            accept=".pdf"
                                            required
                                        >
                                        @error('ppcCurso')
                                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="flex flex-wrap -mx-2 mb-4">
                                    <div class="w-full md:w-1/3 px-2 mb-4 md:mb-0">
                                        <label class="block text-[#272727] text-sm font-bold mb-2" for="nivelCurso"><i class="bi bi-bar-chart-steps"></i> Nível<span class="text-red-800">*</span></label>
                                        <select name="nivelCurso" id="nivelCurso" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-600" required>
                                            <option value="" disabled {{ old('nivelCurso') ? '' : 'selected' }}>Selecione um Nível</option>
                                            <option value="Ensino Fundamental" {{ old('nivelCurso') == 'Ensino Fundamental' ? 'selected' : '' }}>Ensino Fundamental</option>
                                            <option value="Ensino Médio" {{ old('nivelCurso') == 'Ensino Médio' ? 'selected' : '' }}>Ensino Médio</option>
                                            <option value="Técnico" {{ old('nivelCurso') == 'Técnico' ? 'selected' : '' }}>Técnico</option>
                                            <option value="Superior" {{ old('nivelCurso') == 'Superior' ? 'selected' : '' }}>Superior</option>
                                            <option value="Pós-Graduação" {{ old('nivelCurso') == 'Pós-Graduação' ? 'selected' : '' }}>Pós-Graduação</option>
                                        </select>
                                    </div>
                                    <div class="w-full md:w-1/3 px-2 mb-4 md:mb-0">
                                        <label for="periodosCurso" class="block text-sm font-bold text-[#272727] mb-2"><i class="bi bi-123"></i> Qtd. de Períodos<span class="text-red-800">*</span></label>
                                        <input type="number" name="periodosCurso" id="periodosCurso" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-600" placeholder="Ex: 8 ou 3" value="{{ old('periodosCurso') }}" required min="1">
                                    </div>
                                    <div class="w-full md:w-1/3 px-2">
                                        <label for="formatoCurso" class="block text-sm font-bold text-[#272727] mb-2"><i class="bi bi-calendar-week"></i> Formato do Curso<span class="text-red-800">*</span></label>
                                        <select name="formatoCurso" id="formatoCurso" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-600" required>
                                            <option value="" disabled {{ old('formatoCurso') ? '' : 'selected' }}>Selecione o Formato</option>
                                            <option value="Anual" {{ old('formatoCurso') == 'Anual' ? 'selected' : '' }}>Anual</option>
                                            <option value="Semestral" {{ old('formatoCurso') == 'Semestral' ? 'selected' : '' }}>Semestral</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="block text-[#272727] text-sm font-bold mb-2" for="descricaoCurso"><i class="bi bi-body-text"></i> Descrição (Opcional, max. 200 caracteres)</label>
                                    <textarea name="descricaoCurso" id="descricaoCurso" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-600" placeholder="Descreva o curso, suas características e objetivos." rows="5" maxlength="200" style="resize: none">{{ old('descricaoCurso') }}</textarea>
                                </div>
                                <div class="flex justify-end">
                                    <button type="button" id="btnLimparCampos" class="cursor-pointer bg-gray-300 hover:bg-red-200 text-[#272727] py-2 px-4 rounded-lg mr-5"><i class="bi bi-eraser-fill"></i> Limpar Campos</button>
                                    <button type="submit" class="cursor-pointer bg-[#272727] hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded-lg"><i class="bi bi-floppy"></i> Salvar Curso</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-2xl poppins-regular">
                    <h2 class="text-xl font-bold text-[#272727] mb-4 px-6 py-5"><i class="bi bi-table"></i> Lista de Cursos Cadastrados</h2>
                    <div class="overflow-x-auto px-6">
                        <div class="mb-4">
                            <label class="block text-[#272727] text-sm font-bold mb-2" for="nivelCurso"><i class="bi bi-bar-chart-steps"></i> Busca Avançada</label>
                            <form action="{{ route('instituicao.cursos.create') }}" method="GET" class="flex items-center gap-2">
                                <input type="hidden" name="tab" value="gerenciamento"> <div class="relative w-full">
                                    <input type="text" name="busca" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-600" placeholder="Pesquisar por nome do curso..." value="{{ request('busca') }}">
                                </div>
                                <button type="submit" class="cursor-pointer bg-[#272727] text-white font-semibold py-2 px-4 rounded-lg shadow hover:bg-gray-600 transition-colors"><i class="bi bi-search"></i></button>
                                @if(request('busca'))
                                    <a href="{{ route('instituicao.cursos.create', ['tab' => 'gerenciamento']) }}" class="cursor-pointer bg-gray-300 hover:bg-red-200 text-[#272727] py-2 px-4 rounded-lg"><i class="bi bi-eraser-fill"></i></a>
                                @endif
                            </form>
                        </div><br>
                        <table class="min-w-full bg-white" id="tabela-cursos">
                            <thead class="bg-[#272727] text-white">
                            <tr>
                                <th class="py-3 px-4 text-left text-sm font-semibold uppercase">
                                    <a href="{{ route('instituicao.cursos.create', request()->merge(['sortBy' => 'id', 'direction' => ($sortBy == 'id' && $direction == 'asc') ? 'desc' : 'asc', 'tab' => 'gerenciamento'])->all()) }}#tabela-cursos" class="flex items-center gap-2 group">
                                        <i class="bi bi-hash"></i><span>ID</span>
                                        @if($sortBy == 'id')<i title="Ordenar" class="bi {{ $direction == 'asc' ? 'bi-arrow-up' : 'bi-arrow-down' }}"></i>@else<i title="Ordenar" class="bi bi-arrow-down-up text-gray-400 group-hover:text-white transition-colors"></i>@endif
                                    </a>
                                </th>
                                <th class="py-3 px-4 text-left text-sm font-semibold uppercase">
                                    <a href="{{ route('instituicao.cursos.create', request()->merge(['sortBy' => 'nomeCurso', 'direction' => ($sortBy == 'nomeCurso' && $direction == 'asc') ? 'desc' : 'asc', 'tab' => 'gerenciamento'])->all()) }}#tabela-cursos" class="flex items-center gap-2 group">
                                        <i class="bi bi-alphabet"></i><span>Nome do Curso</span>
                                        @if($sortBy == 'nomeCurso')<i title="Ordenar" class="bi {{ $direction == 'asc' ? 'bi-arrow-up' : 'bi-arrow-down' }}"></i>@else<i title="Ordenar" class="bi bi-arrow-down-up text-gray-400 group-hover:text-white transition-colors"></i>@endif
                                    </a>
                                </th>
                                <th class="py-3 px-4 text-left text-sm font-semibold uppercase">
                                    <a href="{{ route('instituicao.cursos.create', request()->merge(['sortBy' => 'nivelCurso', 'direction' => ($sortBy == 'nivelCurso' && $direction == 'asc') ? 'desc' : 'asc', 'tab' => 'gerenciamento'])->all()) }}#tabela-cursos" class="flex items-center gap-2 group">
                                        <i class="bi bi-bar-chart-steps"></i><span>Nível</span>
                                        @if($sortBy == 'nivelCurso')<i title="Ordenar" class="bi {{ $direction == 'asc' ? 'bi-arrow-up' : 'bi-arrow-down' }}"></i>@else<i title="Ordenar" class="bi bi-arrow-down-up text-gray-400 group-hover:text-white transition-colors"></i>@endif
                                    </a>
                                </th>
                                <th class="py-3 px-4 text-left text-sm font-semibold uppercase">
                                    <a href="{{ route('instituicao.cursos.create', request()->merge(['sortBy' => 'statusCurso', 'direction' => ($sortBy == 'statusCurso' && $direction == 'asc') ? 'desc' : 'asc', 'tab' => 'gerenciamento'])->all()) }}#tabela-cursos" class="flex items-center gap-2 group">
                                        <i class="bi bi-toggles2"></i><span>Status</span>
                                        @if($sortBy == 'statusCurso')<i title="Ordenar" class="bi {{ $direction == 'asc' ? 'bi-arrow-up' : 'bi-arrow-down' }}"></i>@else<i title="Ordenar" class="bi bi-arrow-down-up text-gray-400 group-hover:text-white transition-colors"></i>@endif
                                    </a>
                                </th>
                                <th class="py-3 px-4 text-center text-sm font-semibold uppercase"><i class="bi bi-sliders"></i> Ações</th>
                            </tr>
                            </thead>
                            <tbody class="text-gray-700">
                            @forelse ($cursos as $curso)
                                <tr class="border-b border-gray-200 hover:bg-gray-200">
                                    <td class="py-3 px-4">{{ $curso->id }}</td>
                                    <td class="py-3 px-4">{{ $curso->nomeCurso }}</td>
                                    <td class="py-3 px-4">{{ $curso->nivelCurso }}</td>
                                    <td class="py-3 px-4">
                                        @if ($curso->statusCurso == 'ativo')
                                            <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full">● Ativo</span>
                                        @else
                                            <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full">● Inativo</span>
                                        @endif
                                    </td>
                                    <td class="py-3 px-4 text-center">
                                        <div class="flex justify-center items-center gap-2">
                                            <button type="button" class="text-gray-600 hover:text-gray-900 cursor-pointer view-details-btn" title="Ver Detalhes" data-curso="{{ json_encode($curso) }}">
                                                <i class="bi bi-eye-fill text-lg"></i>
                                            </button>

                                            <!-- BOTÃO DE DOWNLOAD DO PPC -->
                                            @if ($curso->ppcCurso)
                                                <a href="{{ Storage::url($curso->ppcCurso) }}"
                                                   download
                                                   class="text-green-600 hover:text-green-900 cursor-pointer"
                                                   title="Baixar PPC do Curso">
                                                    <i class="bi bi-file-earmark-arrow-down-fill text-lg"></i>
                                                </a>
                                            @endif

                                            <a href="{{ route('cursos.edit', $curso->id) }}" class="text-blue-600 hover:text-blue-900 cursor-pointer" title="Alterar Curso"><i class="bi bi-pencil-square text-lg"></i></a>

                                            <form action="{{ route('cursos.destroy', $curso ->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este curso?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900 cursor-pointer" title="Excluir Curso"><i class="bi bi-trash-fill text-lg"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="5" class="py-4 px-4 text-center text-gray-500">Nenhum curso cadastrado ainda.</td></tr>
                            @endforelse
                            </tbody>
                        </table>

                    </div>
                    <div class="mt-6 px-6 py-5 font-poppins-regular">{{ $cursos->appends(request()->query())->fragment('tabela-cursos')->links() }}</div>
                </div>
            </div>

            <div id="relatorios" class="tab-content hidden p-4">
                <div class="bg-white rounded-xl shadow-2xl poppins-regular">
                    <div class="px-6 py-5">
                        <h3 class="text-xl font-bold text-[#272727]"><i class="bi bi-filetype-pdf"></i> Relatórios Rápidos</h3>
                        <p class="mt-2 text-gray-600">Gere relatórios rápidos em PDF com a lista de cursos de acordo com o status desejado.</p>
                        <br>
                        <div class="flex flex-wrap gap-4 justify-start">
                            <a href="{{ route('reports.cursos', ['status' => 'todos']) }}" class="inline-block bg-[#272727] text-white font-semibold py-2 px-5 rounded-lg shadow hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-opacity-75 transition-colors">
                                <i class="bi bi-file-earmark-text-fill"></i> Todos os Cursos
                            </a>
                            <a href="{{ route('reports.cursos', ['status' => 'ativos']) }}" class="inline-block bg-[#272727] text-white font-semibold py-2 px-5 rounded-lg shadow hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-opacity-75 transition-colors">
                                <i class="bi bi-file-earmark-check-fill"></i> Apenas Cursos Ativos
                            </a>
                            <a href="{{ route('reports.cursos', ['status' => 'inativos']) }}" class="inline-block bg-[#272727] text-white font-semibold py-2 px-5 rounded-lg shadow hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-opacity-75 transition-colors">
                                <i class="bi bi-file-earmark-minus-fill"></i> Apenas Cursos Inativos
                            </a>
                        </div>
                    </div>
                </div>
                <br>
                <div class="bg-white rounded-xl shadow-2xl poppins-regular">
                    <div class="px-6 py-5">
                        <h3 class="text-xl font-bold text-[#272727]"><i class="bi bi-file-earmark-zip-fill"></i> Relatório Geral do Curso</h3>
                        <p class="mt-2 text-gray-600">Gere um relatório completo com dados, disciplinas e informações de um curso específico.</p>
                        <br>

                        <!-- Formulário para selecionar o curso e gerar o relatório -->
                        <form action="" method="GET" id="formRelatorioGeral">
                            @csrf

                            <!-- Seletor de Curso -->
                            <div class="mb-3">
                                <select name="curso_id" id="curso_id_select" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-600" required>
                                    <option value="" disabled selected>Selecione um curso</option>
                                    {{-- Loop para popular o seletor com os cursos --}}
                                    @foreach ($cursos as $curso)
                                        <option value="{{ $curso->id }}">{{ $curso->nomeCurso }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="inline-block bg-[#272727] text-white font-semibold py-2 px-5 rounded-lg shadow hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-opacity-75 transition-colors">
                                <i class="bi bi-file-earmark-text-fill"></i> Gerar Relatório
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Script para montar a URL dinamicamente (pode ser o mesmo de antes) -->
                <script>
                    // Na sua view principal (com as abas)
                    document.getElementById('formRelatorioGeral').addEventListener('submit', function(event) {
                        event.preventDefault();
                        const select = document.getElementById('curso_id_select');
                        const cursoId = select.value;

                        if (cursoId) {
                            // Pega a URL da página atual
                            const returnUrl = window.location.href;

                            // Monta a URL do relatório, adicionando a URL de retorno como um parâmetro
                            const url = `{{ url('/relatorios/cursos') }}/${cursoId}/dossie?return_url=${encodeURIComponent(returnUrl)}`;

                            // Navega para a nova URL na mesma aba
                            window.location.href = url;
                        } else {
                            alert('Por favor, selecione um curso para gerar o relatório.');
                        }
                    });
                </script>
            </div>
        </div>

    </div>
</div>

<div id="detailsModal" class="fixed hidden inset-0 bg-black/30 backdrop-blur-sm z-40 flex items-center justify-center p-4 transition-opacity duration-300">
    <div class="relative mx-auto p-5 w-auto min-w-[55%] max-w-[100%] md:max-w-5xl flex flex-col max-h-[90vh] shadow-lg rounded-md bg-white">
        <div class="flex justify-between items-start pb-3">
            <h3 class="text-xl font-bold text-[#272727]"><i class="bi bi-info-circle-fill"></i> Detalhes do Curso</h3>
            <button id="closeModalBtn" class="text-black cursor-pointer text-2xl leading-none">&times;</button>
        </div>
        <div class="flex">
            <div class="flex w-1/2 mr-percent-5">
                <div class="mt-4 space-y-5 poppins-regular text-justify w-full">
                    <div class="flex justify-between"><p><strong><i class="bi bi-hash"></i> ID:</strong> <span id="modal-id"></span></p><p><strong><i class="bi bi-toggles2"></i> Status:</strong> <span id="modal-statusCurso"></span></p><p><strong><i class="bi bi-toggles2"></i> Formato:</strong> <span id="modal-formatoCurso"></span></p></div>
                    <p><strong><i class="bi bi-alphabet"></i> Nome:</strong> <span id="modal-nomeCurso"></span></p>
                    <div class="flex justify-between"><p><strong><i class="bi bi-bar-chart-steps"></i> Nível:</strong> <span id="modal-nivelCurso"></span></p><p><strong><i class="bi bi-clock"></i> CH Toral:</strong> <span id="modal-curso-carga-total" class="font-regular text-[#272727]"></span></p></div>
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
        </div><br>
        <p class="text-justify"><strong><i class="bi bi-card-text poppins-regular"></i> Descrição:</strong> <span id="modal-descricaoCurso"></span></p>
        <div class="mt-4 pt-4">
            <h4 class="font-bold text-md text-[#272727] mb-2"><i class="bi bi-journal-bookmark"></i> Disciplinas do Curso:</h4>
            <div id="modal-disciplinas-container" class="border rounded-lg max-h-60 overflow-y-auto bg-gray-50"></div>
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
            const message = @json($toastMessage);
            const toastElement = document.getElementById('toast-notification');
            if (!toastElement || !message) return;
            requestAnimationFrame(() => { toastElement.classList.remove('opacity-0', '-translate-y-4'); });
            setTimeout(() => {
                toastElement.classList.add('opacity-0', '-translate-y-4');
                toastElement.addEventListener('transitionend', () => toastElement.remove(), {once: true});
            }, 5000);
        })();
    </script>
@endif

<script src="{{ asset('js/resetInputFormCursos.js') }}"></script>
<script src="{{ asset('js/modalDetalhesCurso.js') }}"></script>
<script src="{{ asset('js/tabsManager_Cursos.js') }}"></script>
</body>
</html>
