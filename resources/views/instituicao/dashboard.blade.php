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
    <title>Dashboard - Instituição</title>
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

<body class="flex min-h-screen bg-white text-black">


    <!-- Sidebar -->
    <aside id="sidebar" class="w-64 bg-[#272727] text-white transition-all duration-300 flex flex-col">
        <!-- Topo da Sidebar -->
        <div class="flex items-center justify-between px-4 py-4">
            <h1 class="text-xl font-bold sidebar-label poppins-semibold">Instituição</h1>
            <button id="toggleSidebar" class="text-white text-2xl focus:outline-none">
                <i class="bi bi-list"></i>
            </button>
        </div>

        <!-- Menu -->
        <nav class="mt-6 flex-1 space-y-2">
            <a href="#"
                class="flex items-center space-x-3 hover:bg-white/10 px-4 py-2 rounded transition-all duration-300 poppins-semibold">
                <i class="bi bi-house-door-fill text-lg"></i>
                <span class="sidebar-label">Dashboard</span>
            </a>
            <a href="#"
                class="flex items-center space-x-3 hover:bg-white/10 px-4 py-2 rounded transition-all duration-300 poppins-semibold">
                <i class="bi bi-calendar-week text-lg"></i>
                <span class="sidebar-label">Calendário</span>
            </a>
            <a href="#"
                class="flex items-center space-x-3 hover:bg-white/10 px-4 py-2 rounded transition-all duration-300 poppins-semibold">
                <i class="bi bi-graph-up text-lg"></i>
                <span class="sidebar-label">Gráficos</span>
            </a>
            <a href="#"
                class="flex items-center space-x-3 hover:bg-white/10 px-4 py-2 rounded transition-all duration-300 poppins-semibold">
                <i class="bi bi-clock-history text-lg"></i>
                <span class="sidebar-label">Relógio</span>
            </a>
        </nav>
    </aside>

    <!-- Conteúdo principal -->
    <main class="flex-1 p-6">
        <h1 class="text-2xl font-bold mb-4 poppins-bold">
            Bem-vindo(a), {{ session('usuario_nome') }}
        </h1>
        
        <a href="{{ route('logout') }}" class="bg-black text-white px-4 py-2 rounded hover:bg-gray-800 poppins-semibold"><i class="bi bi-box-arrow-left"></i> Sair</a>
    </main>
</body>
<script>
    const toggleBtn = document.getElementById('toggleSidebar');
    const sidebar = document.getElementById('sidebar');
    const labels = document.querySelectorAll('.sidebar-label');
    const links = sidebar.querySelectorAll('a');
    if (toggleBtn && sidebar) {
        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('w-64');
            sidebar.classList.toggle('w-16');

            labels.forEach(label => label.classList.toggle('hidden'));
            links.forEach(link => link.classList.toggle('justify-center'));
        });
    }
</script>
</html>
