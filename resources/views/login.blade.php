<!DOCTYPE html>
<html lang="en">
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
      rel="stylesheet"
    />
    <title>Login - Scholarium</title>
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
          .mr-percent-1{
            margin-right: 1%;
          }
          .mr-percent-5{
            margin-right: 5%;
          }
          .mr-percent-10{
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
            <a href="{{ route('welcome') }}">Scholarium</a>
        </div>
        <!-- Links -->
        <div class="hidden md:flex space-x-6 text-lg">
            <a href="{{ route('contato') }}" class="hover:text-gray-500 transition duration-300"><i class="bi bi-envelope-at"></i> Contato</a>
            <a href="{{ route('cadastrar') }}" class="hover:text-gray-500 transition duration-300"><i class="bi bi-people"></i> Começar</a>
            <a href="{{ route('login') }}" class="hover:text-gray-500 transition duration-300"><i class="bi bi-box-arrow-in-right"></i> Login</a>
            
        </div>
        <!-- Ícone de Menu Hamburguer (para telas pequenas) -->
        <button class="md:hidden text-2xl" id="hamburger-icon">
            <i class="bi bi-list"></i>
        </button>
    </div>
    <!-- Menu Responsivo Mobile -->
    <div class="md:hidden hidden text-lg" id="mobile-menu">
        <br>
        <a href="{{ route('contato') }}" class="block text-center py-2 hover:text-gray-500"><i class="bi bi-envelope-at"></i> Contato</a>
        <a href="{{ route('cadastrar') }}" class="block text-center py-2 hover:text-gray-500"><i class="bi bi-people"></i> Começar</a>
        <a href="{{ route('login') }}" class="block text-center py-2 hover:text-gray-500"><i class="bi bi-box-arrow-in-right"></i> Login</a>
        
    </div>
</nav>
</body>
</html>