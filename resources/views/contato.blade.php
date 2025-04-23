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
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <title>Contato - Scholarium</title>
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
    <br><br><br><br>
    <!-- Form de Contato -->
    <div class="ml-percent-5 mr-percent-5 flex poppins-regular">
        <!-- Lado Esquerdo - Logo e Mensagem -->
        <div class="w-1/2 flex flex-col justify-center p-6 bg-[#272727] rounded-xl">
            <h2 class="text-2xl font-bold text-white mb-4 text-center">Contate-nos!</h2>
            <p class="text-gray-400 text-center">
                Ficou com alguma dúvida? Está com algum problema? Quer fazer uma crítica ou sugestão? Envie-nos uma mensagem pelo formulário de contato e retornaremos assim que possível.
            </p>
            <br>    
            <h2 class="text-lg text-white mb-4 text-center">Não precisa de ajuda? <a href="/auth/login-instituicao"
                    class="font-bold">Faça o Login Aqui!</a></h2>
        </div>
        <!-- Lado Direito - Formulário -->
        <div class="w-1/2 p-6 inset-shadow-sm inset-shadow-gray-400/90 rounded-xl ml-percent-1">
            <h2 class="text-3xl font-bold text-gray-800 mb-4"><i class="bi bi-envelope-arrow-up"></i> Contato</h2>
            <br>
            <form action="{{ route('contato.enviar') }}" method="POST">
                @csrf
                <label class="block text-[#272727] text-sm font-bold mb-2" for="emailRetorno"><i class="bi bi-envelope-at"></i> E-Mail (Para Retorno)</label>
                <input 
                    type="email"
                    name="emailRetorno"
                    id="emailRetorno"
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Ex.: email.pessoal@retorno.com"
                >
                <br><br>
                <label class="block text-[#272727] text-sm font-bold mb-2" for="mensageContato"><i class="bi bi-chat-left-dots"></i> Mensagem</label>
                <textarea
                    name="mesageContato"
                    id="mesageContato"
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Digite aqui sua mensagem..."
                    rows="10"
                ></textarea>
                <br><br>
                <div>
                    <button type="submit" class="w-full bg-[#272727] text-white py-2 px-4 rounded-lg hover:bg-gray-700 transition"><i class="bi bi-send-plus"></i> Enviar Mensagem</button>
                </div>
            </form>
        </div>
    </div>
    <br><br><br><br>
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