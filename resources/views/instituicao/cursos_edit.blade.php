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
    <title>Editar Cursos - Instituição</title>
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
        <br>
        <h1 class="text-2xl font-bold text-[#272727] mb-6"><i class="bi bi-arrow-clockwise"></i> Alteração de Dados</h1>
        <p>Aqui você pode alterar os dados da Instituição de Ensino selecionada.</p>
        <br>
        <div class="bg-white rounded-xl shadow-2xl poppins-regular p-8">

            {{-- Título da Página --}}
            <h1 class="text-2xl font-bold text-[#272727] mb-6">
                <i class="bi bi-pencil-square"></i> Editar Curso: {{ $curso->nomeCurso }}
            </h1>

            <form action="{{ route('cursos.update', $curso->id) }}" method="POST">
                @csrf
                @method('PUT') {{-- Diretiva para usar o método HTTP PUT --}}

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Nome do Curso --}}
                    <div>
                        <label for="nomeCurso" class="block text-sm font-medium text-gray-700"><i
                                class="bi bi-alphabet"></i> Nome do Curso <span class="text-red-600">*</span></label>
                        <input type="text" name="nomeCurso" id="nomeCurso"
                               value="{{ old('nomeCurso', $curso->nomeCurso) }}"
                               class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-600"
                               required>
                    </div>

                    {{-- Nível do Curso --}}
                    <div>
                        <label for="nivelCurso" class="block text-sm font-medium text-gray-700"><i
                                class="bi bi-bar-chart-steps"></i> Nível <span class="text-red-600">*</span></label>
                        <select name="nivelCurso" id="nivelCurso"
                                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-600"
                                required>
                            <option
                                value="Ensino Fundamental" {{ old('nivelCurso', $curso->nivelCurso) == 'Ensino Fundamental' ? 'selected' : '' }}>
                                Ensino Fundamental
                            </option>
                            <option
                                value="Ensino Médio" {{ old('nivelCurso', $curso->nivelCurso) == 'Ensino Médio' ? 'selected' : '' }}>
                                Ensino Médio
                            </option>
                            <option
                                value="Técnico" {{ old('nivelCurso', $curso->nivelCurso) == 'Técnico' ? 'selected' : '' }}>
                                Técnico
                            </option>
                            <option
                                value="Superior" {{ old('nivelCurso', $curso->nivelCurso) == 'Superior' ? 'selected' : '' }}>
                                Superior
                            </option>
                            <option
                                value="Pós-Graduação" {{ old('nivelCurso', $curso->nivelCurso) == 'Pós-Graduação' ? 'selected' : '' }}>
                                Pós-Graduação
                            </option>
                        </select>
                    </div>
                </div>

                {{-- Descrição --}}
                <div class="mt-6">
                    <label for="descricaoCurso" class="block text-sm font-medium text-gray-700"><i
                            class="bi bi-bar-chart-steps"></i> Descrição (Max. 200 caracteres)</label>
                    <textarea name="descricaoCurso" id="descricaoCurso" rows="3" maxlength="200"
                              class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-600">{{ old('descricaoCurso', $curso->descricaoCurso) }}</textarea>
                </div>

                {{-- Status do Curso --}}
                <div class="mt-6">
                    <label for="statusCurso" class="block text-sm font-medium text-gray-700"><i
                            class="bi bi-toggle2-off"></i> Status <span class="text-red-600">*</span></label>
                    <select name="statusCurso" id="statusCurso"
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-600"
                            required>
                        <option
                            value="Ativo" {{ old('statusCurso', $curso->statusCurso) == 'Ativo' ? 'selected' : '' }}>
                            Ativo
                        </option>
                        <option
                            value="Inativo" {{ old('statusCurso', $curso->statusCurso) == 'Inativo' ? 'selected' : '' }}>
                            Inativo
                        </option>
                    </select>
                </div>

                {{-- Botões de Ação --}}
                <div class="mt-8 flex justify-end gap-4">
                    <a href="{{ route('instituicao.cursos.create') }}"
                       class="bg-white text-gray-700 font-semibold py-2 px-4 rounded-lg border border-gray-300 hover:bg-red-200 focus:outline-none focus:ring-2 cursor-pointer focus:ring-offset-2 focus:ring-gray-600 transition-colors"><i
                            class="bi bi-x-circle"></i> Cancelar
                    </a>
                    <button type="submit"
                            class="cursor-pointer bg-[#272727] hover:bg-gray-600 text-white py-2 px-4 rounded-lg">
                        <i class="bi bi-floppy"></i> Salvar Alterações
                    </button>
                </div>
            </form>
        </div>
</body>
</html>
