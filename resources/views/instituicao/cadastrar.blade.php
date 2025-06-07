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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=history_edu" />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <title>Cadastro de Instituição - Scholarium</title>
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
            <h2 class="text-2xl font-bold text-white mb-4 text-center">Junte-se ao Scholarium!</h2>
            <p class="text-gray-400 text-center">
                Cadastre-se agora e tenha acesso a um sistema intuitivo para gerenciar sua instituição de ensino de forma fácil.
            </p>
            <br>
            <h2 class="text-lg text-white mb-4 text-center">Já possui cadastro? <a href="/auth/login-instituicao"
                    class="font-bold">Faça o Login Aqui!</a></h2>
        </div>
        <!-- Lado Direito - Formulário -->
        <div class="w-1/2 p-6 inset-shadow-sm inset-shadow-gray-400/90 rounded-xl ml-percent-1">
            <h2 class="text-3xl font-bold text-gray-800 mb-4"><i class="bi bi-buildings"></i> Cadastro da Instituição de Ensino</h2>
            <br>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="bg-red-200 rounded-xl pl-4 pr-4 py-2"><i class="bi bi-exclamation-diamond"></i> {{ $error }}</li>
                            <br>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('instituicao.store') }}" method="POST">
                @csrf
                <h2 class="text-lg font-bold text-gray-800 mb-4"><i class="bi bi-buildings"></i> Dados da Instituição</h2>
                <hr>
                <br>
                <div class="flex">
                    <!-- Nome -->
                    <div class="mb-4 w-3/5">
                        <label class="block text-[#272727] text-sm font-bold mb-2" for="nomeInstituicao"><i class="bi bi-alphabet"></i> Nome<span class="text-red-800">*</span></label>
                        <input 
                            type="text" 
                            name="nomeInstituicao" 
                            id="nomeInstituicao" 
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                            placeholder="Ex.: Escola Brasil"
                            required
                        >
                    </div>
                    <!-- CNPJ -->
                    <div class="mb-4 ml-percent-5 w-2/5">
                        <label for="cnpjInstituicao" class="block text-[#272727] text-sm font-bold mb-2"><i class="bi bi-hash"></i> CNPJ<span class="text-red-800">*</span></label>
                        <input 
                            type="text" 
                            name="cnpjInstituicao" 
                            id="cnpjInstituicao" 
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                            placeholder="Ex.: 12.345.678/0001-90"
                            maxlength="18"
                            required
                        >
                    </div>
                </div>
                <div class="flex">
                    <!-- E-Mail -->
                    <div class="mb-4 w-3/5">
                        <label for="emailInstituicao" class="block text-[#272727] text-sm font-bold mb-2"><i class="bi bi-envelope-at"></i> E-Mail<span class="text-red-800">*</span></label>
                        <input 
                            type="email"
                            name="emailInstituicao"
                            id="emailInstituicao"
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Ex.: administração@escolabrazil.com"
                            value="{{ old('emailInstituicao') }}"
                            required
                        >
                    </div>
                    <!-- Telefone -->
                    <div class="mb-4 ml-percent-5 w-2/5">
                        <label for="telefoneInstituicao" class="block text-[#272727] text-sm font-bold mb-2"><i class="bi bi-telephone"></i> Telefone<span class="text-red-800">*</span></label>
                        <input 
                            type="text"
                            name="telefoneInstituicao"
                            id="telefoneInstituicao"
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Ex.: (00) 9 1234-5678"
                            value="{{ old('telefoneInstituicao') }}"
                            required
                        >
                    </div>
                </div>
                <br>
                <h2 class="text-lg font-bold text-gray-800 mb-4"><i class="bi bi-geo-alt"></i> Endereço da Instituição</h2>
                <hr>
                <br>
                <div class="flex">
                    <!-- CEP -->
                    <div class="mb-4 w-1/2">
                        <label for="cepInstituicao" class="block text-[#272727] text-sm font-bold mb-2"><i class="bi bi-signpost-split"></i> CEP<span class="text-red-800">*</span></label>
                        <input 
                            type="text"
                            name="cepInstituicao"
                            id="cepInstituicao"
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Ex.: 12.234-567"
                            value="{{ old('cepInstituicao') }}"
                            required
                        >
                    </div>
                    <!-- Logradouro -->
                    <div class="mb-4 w-1/2 ml-percent-5">
                        <label for="logradouroInstituicao" class="block text-[#272727] text-sm font-bold mb-2"><i class="bi bi-signpost-split"></i> Logradouro<span class="text-red-800">*</span></label>
                        <input 
                            type="text"
                            name="logradouroInstituicao"
                            id="logradouroInstituicao"
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Ex.: Avenida Getúlio Vargas"
                            value="{{ old('logradouroInstituicao') }}"
                            required
                        >
                    </div>
                </div>
                <div class="flex">
                    <!-- Número -->
                    <div class="mb-4 w-1/3">
                        <label for="numeroInstituicao" class="block text-[#272727] text-sm font-bold mb-2"><i class="bi bi-123"></i> Número<span class="text-red-800">*</span></label>
                        <input 
                            type="text"
                            name="numeroInstituicao"
                            id="numeroInstituicao"
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Ex.: 1234"
                            value="{{ old('numeroInstituicao') }}"
                            required
                        >
                    </div>
                    <!-- Cidade -->
                    <div class="mb-4 w-1/3 ml-percent-5">
                        <label for="cidadeInstituicao" class="block text-[#272727] text-sm font-bold mb-2"><i class="bi bi-geo-alt"></i> Cidade<span class="text-red-800">*</span></label>
                        <input 
                            type="text"
                            name="cidadeInstituicao"
                            id="cidadeInstituicao"
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Ex.: Brasília"
                            value="{{ old('cidadeInstituicao') }}"
                            required
                        >
                    </div>
                    <!-- UF -->
                    <div class="mb-4 w-1/3 ml-percent-5">
                        <label for="ufInstituicao" class="block text-[#272727] text-sm font-bold mb-2"><i class="bi bi-geo-alt"></i> UF<span class="text-red-800">*</span></label>
                        <input 
                            type="text"
                            name="ufInstituicao"
                            id="ufInstituicao"
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Ex.: PR"
                            value="{{ old('ufInstituicao') }}"
                            required
                        >
                    </div>
                </div>
                <br>
                <h2 class="text-lg font-bold text-gray-800 mb-4"><i class="bi bi-bookmark-star"></i> Sistema de Notas</h2>
                <hr>
                <br>
                <div class="mb-4">
                    <div class="flex justify-around">
                        <label class="inline-flex items-center mr-4">
                            <input type="radio" name="notasInstituicao" value="numeral" required class="form-radio text-blue-600 accent-[#272727]">
                            <span class="ml-2"><i class="bi bi-123"></i> Numérico</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="notasInstituicao" value="conceito" required class="form-radio text-blue-600 accent-[#272727]">
                            <span class="ml-2"><i class="bi bi-alphabet"></i> Conceitos (A .. D)</span>
                        </label>
                    </div> 
                </div>
                <br>
                <h2 class="text-lg font-bold text-gray-800 mb-4"><i class="bi bi-shield-lock"></i> Senha</h2>
                <hr>
                <br>
                <div class="flex">
                    <!-- Senha -->
                    <div class="mb-4 w-1/2">
                        <label for="senhaInstituicao" class="block text-[#272727] text-sm font-bold mb-2"><i class="bi bi-person-lock"></i> Senha<span class="text-red-800">*</span></label>
                        <input 
                            type="password"
                            name="senhaInstituicao"
                            id="senhaInstituicao"
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Ex.: Pass@123"
                            required
                        >
                        <small id="senhaMensagem" class="text-red-600 mt-1 hidden">A senha deve conter ao menos: uma letra maiúscula, uma letra minúscula, um número, um caractere especial e pelo menos 8 caracteres.</small>
                    </div>
                    <!-- Confirme a Senha -->
                    <div class="mb-4 w-1/2 ml-5">
                        <label for="confirmaSenhaInstituicao" class="block text-[#272727] text-sm font-bold mb-2"><i class="bi bi-person-lock"></i> Confirme a Senha<span class="text-red-800">*</span></label>
                        <input 
                            type="password"
                            name="confirmaSenhaInstituicao"
                            id="confirmaSenhaInstituicao"
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Ex.: Pass@123"
                            required
                        >
                        <small id="confirmaSenhaMensagem" class="text-red-600 mt-1 hidden">As senhas não correspondem.</small>
                    </div>
                </div>
                <br>
                <div class="text-sm">
                    <p>Ao realizar seu cadastro, você automaticamente confirma que concorda com as cláusulas descritas em nosso Termo de Uso.</p>
                    <p>Para visualizar o Termo de Uso do Scholarium <a href="{{ asset('downloads/termo_de_uso.pdf') }}" download class="underline decoration-solid">clique aqui!</a></p>
                </div>
                <br>
                <div>
                    <button type="submit" class="w-full bg-[#272727] text-white py-2 px-4 rounded-lg hover:bg-gray-700 transition"><i class="bi bi-clipboard2-plus"></i> Cadastrar Instituição</button>
                </div>
            </form>
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
</body>
</html>
