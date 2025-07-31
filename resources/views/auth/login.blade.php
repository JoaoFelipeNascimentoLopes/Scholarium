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
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=history_edu" />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <title>Login - Scholarium</title>
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
    </style>
</head>

<body>
    <!-- Navbar -->
    <br>
    <nav class="bg-[#272727] text-white py-4 ml-percent-5 mr-percent-5 rounded-xl">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <!-- Logo -->
            <div class="text-xl font-bold flex items-center">
                <img src="{{ asset('images/icon_School_White.png') }}" alt="Logo" class="w-12 h-auto mr-percent-5">
                <a href="{{ route('welcome') }}" class="hover:text-gray-500 transition duration-300">Scholarium</a>
            </div>
            <!-- Links -->
            <div class="hidden md:flex space-x-6 text-lg">
                <a href="{{ route('contato') }}" class="hover:text-gray-500 transition duration-300"><i
                        class="bi bi-envelope-at"></i> Contato</a>
                <a href="{{ route('instituicao.create') }}" class="hover:text-gray-500 transition duration-300"><i
                        class="bi bi-people"></i> Começar</a>
                <a href="{{ route('login') }}" class="hover:text-gray-500 transition duration-300"><i
                        class="bi bi-box-arrow-in-right"></i> Login</a>
            </div>
            <!-- Ícone de Menu Hamburguer (para telas pequenas) -->
            <button class="md:hidden text-2xl" id="hamburger-icon">
                <i class="bi bi-list"></i>
            </button>
        </div>
        <!-- Menu Responsivo Mobile -->
        <div class="md:hidden hidden text-lg" id="mobile-menu">
            <br>
            <a href="{{ route('contato') }}" class="block text-center py-2 hover:text-gray-500"><i
                    class="bi bi-envelope-at"></i> Contato</a>
            <a href="{{ route('instituicao.create') }}" class="block text-center py-2 hover:text-gray-500"><i
                    class="bi bi-people"></i> Começar</a>
            <a href="{{ route('login') }}" class="block text-center py-2 hover:text-gray-500"><i
                    class="bi bi-box-arrow-in-right"></i> Login</a>
        </div>
    </nav>
    <br><br>
    <div class="ml-percent-5 mr-percent-5 flex poppins-regular">
        <!-- Lado Esquerdo - Logo e Mensagem -->
        <div class="w-1/2 flex flex-col justify-center p-6 bg-[#272727] rounded-xl">
            <h2 class="text-2xl font-bold text-white mb-4 text-center">Entre no Scholarium!</h2>
            <p class="text-gray-400 text-center">
                Marque qual opção representa o seu usuário e entre com suas credenciais para acessar os recursos do
                sistema disponíveis para você.
            </p>
            <br>
            <h2 class="text-lg text-white mb-4 text-center">Não possui cadastro? <a href="/instituicao/cadastrar"
                    class="font-bold">Faça o Cadastro Aqui!</a></h2>
        </div>
        <!-- Lado Direito - Formulário -->
        <div class="w-1/2 p-6 inset-shadow-sm inset-shadow-gray-400/90 rounded-xl ml-percent-1">
            <h2 class="text-3xl font-bold text-gray-800 mb-4"><i class="bi bi-buildings"></i> Login</h2>
            <br>
            @if ($errors->has('emailLogin'))
                <div class="alert alert-danger">
                    <p class="bg-red-200 rounded-xl pl-4 pr-4 py-2"><i class="bi bi-exclamation-diamond"> </i>{{ $errors->first('emailLogin') }}</p>
                    <br>
                </div>
            @endif
            <form action="" method="POST">
                @csrf
                <h2 class="text-lg font-bold text-gray-800 mb-4"><i class="bi bi-person-bounding-box"></i> Tipo de Usuário</h2>
                <hr>
                <br>
                <fieldset class="space-y-3 flex justify-between ml-percent-5 mr-percent-5">
                    {{-- Seus radio buttons de tipo de usuário --}}
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="opcao" value="1" class="accent-[#272727]" checked />
                        <span><i class="bi bi-buildings"></i> Instituição</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="opcao" value="2" class="accent-[#272727]" />
                        <span><i class="bi bi-clipboard-data"></i> Professor</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="opcao" value="3" class="accent-[#272727]" />
                        <span><i class="bi bi-backpack"></i> Estudante</span>
                    </label>
                </fieldset>
                <br>
                <h2 class="text-lg font-bold text-gray-800 mb-4"><i class="bi bi-person-lock"></i> Credenciais</h2>
                <hr>
                <br>
                <div class="flex">
                    <div class="mb-4 w-3/5">
                        <label for="emailLogin" class="block text-[#272727] text-sm font-bold mb-2">
                            <i class="bi bi-envelope-at"></i> E-Mail<span class="text-red-800">*</span>
                        </label>
                        <input
                            type="email"
                            name="emailLogin"
                            id="emailLogin"
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Ex.: administração@escolabrazil.com"
                            value="{{ old('emailLogin') }}"
                            required>
                    </div>

                    <div class="mb-4 ml-percent-5 w-2/5 relative">
                        <label for="senhaLogin" class="block text-[#272727] text-sm font-bold mb-2">
                            <i class="bi bi-person-lock"></i> Senha<span class="text-red-800">*</span>
                        </label>
                        {{-- Adicionado padding à direita (pr-10) para dar espaço ao ícone --}}
                        <input
                            type="password"
                            name="senhaLogin"
                            id="senhaLogin"
                            class="w-full px-3 pr-10 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Ex.: Pass@123"
                            required>

                        {{-- Botão de visualizar senha posicionado sobre o input --}}
                        <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 top-6 pr-3 flex items-center" title="Mostrar/Esconder Senha">
                            <i id="eyeIcon" class="bi bi-eye-slash-fill text-gray-400 hover:text-[#272727]"></i>
                        </button>
                    </div>
                </div>
                <br>
                <div>
                    <button type="submit" class="w-full bg-[#272727] text-white py-2 px-4 rounded-lg hover:bg-gray-700 transition">
                        <i class="bi bi-box-arrow-in-right"></i> Login
                    </button>
                </div>
            </form>
            <br>
        </div>
    </div>
    <br><br>
    <footer class="bg-[#272727] text-white py-8 ml-percent-5 mr-percent-5 rounded-xl">
        <div class="container mx-auto px-6 flex flex-col md:flex-row justify-between items-center poppins-regular">
            <!-- Logo e descrição -->
            <div class="text-center md:text-left">
                <p class="text-xl font-bold">Scholarium</p>
                <p class="text-sm text-gray-400">Gestão Inteligente, Ensino Eficiente!</p>
            </div>
            <!-- Direitos autorais -->
            <div class="text-sm text-gray-400 mt-6 md:mt-0">
                © 2025 Scholarium. Todos os direitos reservados.
            </div>
        </div>
    </footer>
    <br>
    <script src="{{ asset('js/viewPassword.js') }}"></script>
</body>
</html>
