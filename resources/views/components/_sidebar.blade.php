<aside id="sidebar" class="bg-[#272727] text-white w-64 space-y-6 py-7 px-2 fixed inset-y-0 left-0 poppins-regular transform sidebar-transition z-20">
    <a href="{{ route('instituicao.dashboard') }}" class="flex justify-center"><img src="{{ asset('images/icon_School_White.png') }}"></a>
    <a href="{{ route('instituicao.dashboard') }}" class="flex justify-center text-xl font-semibold">Instituição</a>
    <nav>
        <a href="{{ route('instituicao.dashboard') }}" class="text-lg block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white">
            <i class="bi bi-kanban"></i> Dashboard
        </a>
        <a href="{{ route('instituicao.estudantes') }}" class="text-lg block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white">
            <i class="bi bi-backpack2"></i> Estudantes
        </a>
        <a href="{{ route('instituicao.professores') }}" class="text-lg block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white">
            <i class="bi bi-briefcase"></i> Professores
        </a>
        <a href="{{ route('instituicao.turmas') }}" class="text-lg block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white">
            <i class="bi bi-mortarboard"></i> Turmas
        </a>
        <a href="{{ route('instituicao.disciplinas') }}" class="text-lg block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white">
            <i class="bi bi-journal-bookmark"></i> Disciplinas
        </a>
        <a href="{{ route('instituicao.cursos.create') }}" class="text-lg block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white">
            <i class="bi bi-award"></i> Cursos
        </a>
        <a href="{{ route('instituicao.configuracoes') }}" class="text-lg block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white">
            <i class="bi bi-gear"></i> Configurações
        </a>
        <a href="{{ route('logout') }}" class="text-lg block py-2.5 px-4 rounded transition duration-200 hover:bg-red-500 hover:text-black">
            <i class="bi bi-box-arrow-left"></i> Sair
        </a>
    </nav>
</aside>