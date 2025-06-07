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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=history_edu" />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
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
                                <a href="{{ route('reports.cursos', ['status' => 'todos']) }}" class="inline-block bg-[#272727] text-white font-semibold py-2 px-5 rounded-lg shadow hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-opacity-75 transition-colors content-center mr-5">
                                    <i class="bi bi-filetype-pdf"></i> Cursos Cadastrados
                                </a>
                                <a href="{{ route('reports.cursos', ['status' => 'ativos']) }}" class="inline-block bg-[#272727] text-white font-semibold py-2 px-5 rounded-lg shadow hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-opacity-75 transition-colors content-center mr-5">
                                    <i class="bi bi-filetype-pdf"></i> Cursos Ativos
                                </a>
                                <a href="{{ route('reports.cursos', ['status' => 'inativos']) }}" class="inline-block bg-[#272727] text-white font-semibold py-2 px-5 rounded-lg shadow hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-opacity-75 transition-colors content-center">
                                    <i class="bi bi-filetype-pdf"></i> Cursos Inativos
                                </a>
                            </div>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-2xl poppins-regular w-1/2">
                    <div class="px-6 py-5">
                        <h3 class="text-xl font-bold text-[#272727]"><i class="bi bi-bar-chart-line"></i> Cursos por Nível</h3>
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
                                    <label class="block text-[#272727] text-sm font-bold mb-2" for="nomeCurso"><i class="bi bi-alphabet"></i> Nome<span class="text-red-800">*</span></label>
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
                                <div class="mb-4 w-2/5">
                                    <label class="block text-[#272727] text-sm font-bold mb-2" for="nivelCurso"><i class="bi bi-bar-chart-steps"></i> Nível<span class="text-red-800">*</span></label>
                                    <select name="nivelCurso" id="nivelCurso" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-600" required>
                                        <option value="" disabled selected>Selecione um nível</option>
                                        <option value="Ensino Fundamental">Ensino Fundamental</option>
                                        <option value="Ensino Médio">Ensino Médio</option>
                                        <option value="Técnico">Técnico</option>
                                        <option value="Superior">Superior</option>
                                        <option value="Pós-Graduação">Pós-Graduação</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="flex">
                                <div class="mb-4 w-full">
                                    <label class="block text-[#272727] text-sm font-bold mb-2" for="nivelCurso"><i class="bi bi-bar-chart-steps"></i> Descrição</label>
                                    <textarea 
                                        name="descricaoCurso" 
                                        id="descricaoCurso" 
                                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-600" 
                                        placeholder="Descreva o curso, suas características e objetivos." 
                                        rows="2"
                                        maxlength="200"
                                        style="resize: none"
                                    ></textarea>
                                </div>
                            </div>
                            <div class="flex justify-end">
                                <button type="button" id="btnLimparCampos" class="cursor-pointer bg-gray-300 hover:bg-red-200 text-[#272727] py-2 px-4 rounded-lg mr-5"><i class="bi bi-eraser-fill"></i> Limpar Campos</button>
                                <button type="submit" class="cursor-pointer bg-[#272727] hover:bg-gray-600 text-white py-2 px-4 rounded-lg"><i class="bi bi-floppy"></i> Salvar Curso</button>
                            </div>
                        </form>
                    </div>
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
        (function() {
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
                }, { once: true });

            }, 3000); // 3 segundos
        })();
    </script>
@endif
    <script src="{{ asset('js/resetInputFormCursos.js') }}"></script>
</body>
</html>