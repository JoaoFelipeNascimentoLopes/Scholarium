<!DOCTYPE html>
<html lang="pt-BR" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/js/app.js'])
    <link rel="icon" href="{{ asset('images/page_Icon.png') }}" type="image/png">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=history_edu" />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <title>Configurações - Instituição</title>
    <!-- Estilos -->
    <style>
        .poppins-regular { font-family: "Poppins", serif; font-weight: 400; }
        .poppins-semibold { font-family: "Poppins", serif; font-weight: 600; }
        .poppins-bold { font-family: "Poppins", serif; font-weight: 700; }

        summary { list-style: none; }
        summary::-webkit-details-marker { display: none; }
        details[open] summary .arrow-icon { transform: rotate(180deg); }
    </style>
    <style type="text/tailwindcss">
        .sidebar-transition { transition: transform 0.3s ease-in-out, width 0.3s ease-in-out; }
        .content-transition { transition: margin-left 0.3s ease-in-out; }
    </style>
</head>
<body class="bg-gray-50">
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

        <h1 class="text-2xl font-bold mb-2"><i class="bi bi-gear"></i> Configurações</h1>
        <p class="mb-6 text-gray-600">Aqui você pode gerenciar a sua Instituição de Ensino e ter acesso às informações gerais do Scholarium</p>

        <!-- ESTRUTURA DE ABAS -->
        <div class="mb-4 border-b border-gray-200">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" role="tablist">
                <li class="mr-2" role="presentation">
                    <button class="tab-button inline-block p-4 border-b-2 rounded-t-lg" type="button" role="tab" onclick="openTab(event, 'instituicao')">
                        <i class="bi bi-buildings-fill mr-1"></i> Minha Instituição
                    </button>
                </li>
                <li class="mr-2" role="presentation">
                    <button class="tab-button inline-block p-4 border-b-2 rounded-t-lg" type="button" role="tab" onclick="openTab(event, 'estrutura')">
                        <i class="bi bi-diagram-3-fill mr-1"></i> Estrutura Organizacional
                    </button>
                </li>
                <li class="mr-2" role="presentation">
                    <button class="tab-button inline-block p-4 border-b-2 rounded-t-lg" type="button" role="tab" onclick="openTab(event, 'sobre')">
                        <i class="bi bi-info-circle-fill mr-1"></i> Sobre o Sistema
                    </button>
                </li>
            </ul>
        </div>

        <!-- CONTEÚDO DAS ABAS -->
        <div id="tabContent">
            <!-- Aba 1: Minha Instituição -->
            <div id="instituicao" class="tab-content hidden p-4">
                <details class="bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-600 hover:shadow-2xl" open>
                    <summary class="px-6 py-5 flex items-center justify-between cursor-pointer list-none">
                        <div>
                            <h2 class="text-xl font-bold text-[#272727] poppins-bold sm:text-2xl">
                                <i class="bi bi-layout-text-sidebar-reverse"></i> Detalhes da Instituição
                            </h2>
                            <p class="mt-1 text-sm text-gray-500 poppins-regular">
                                Clique para expandir ou recolher as informações
                            </p>
                        </div>
                        <div class="arrow-icon transform transition-transform duration-300">
                            <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </summary>
                    <div class="p-6 md:p-8 border-t border-gray-200">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-8">
                            <div>
                                <h3 class="text-lg font-semibold text-[#272727] poppins-semibold uppercase tracking-wider mb-4">Informações Gerais</h3>
                                <div class="space-y-4">
                                    <p class="text-sm"><span class="block poppins-medium text-gray-800"><i class="bi bi-alphabet"></i> Nome:</span><span class="text-gray-600 poppins-regular">{{ $instituicao->nomeInstituicao }}</span></p>
                                    <p class="text-sm"><span class="block poppins-medium text-gray-800"><i class="bi bi-hash"></i> CNPJ:</span><span class="text-gray-600 poppins-regular">{{ $instituicao->cnpjInstituicao }}</span></p>
                                    <p class="text-sm"><span class="block poppins-medium text-gray-800"><i class="bi bi-telephone"></i> Telefone:</span><span class="text-gray-600 poppins-regular">{{ $instituicao->telefoneInstituicao }}</span></p>
                                    <p class="text-sm"><span class="block poppins-medium text-gray-800"><i class="bi bi-envelope-at"></i> E-mail:</span><span class="text-gray-600 poppins-regular">{{ $instituicao->emailInstituicao }}</span></p>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-[#272727] poppins-semibold uppercase tracking-wider mb-4">Configurações Acadêmicas</h3>
                                <div class="space-y-4">
                                    <p class="text-sm"><span class="block poppins-medium text-gray-800"><i class="bi bi-bookmark-star"></i> Sistema de Notas:</span><span class="text-gray-600 poppins-regular">{{ ucfirst($instituicao->notasInstituicao) }}</span></p>
                                </div>
                            </div>
                            <div class="md:col-span-2">
                                <h3 class="text-lg font-semibold text-[#272727] poppins-semibold uppercase tracking-wider mb-4">Endereço Principal</h3>
                                <div class="space-y-4">
                                    <p class="text-sm text-gray-600 poppins-regular">
                                        <i class="bi bi-signpost-split"></i> {{ $instituicao->logradouroInstituicao }}, nº {{ $instituicao->numeroInstituicao }}<br>
                                        <i class="bi bi-geo-alt"></i> {{ $instituicao->cidadeInstituicao }} - {{ $instituicao->ufInstituicao }}<br>
                                        <i class="bi bi-signpost-split"></i> CEP: {{ $instituicao->cepInstituicao }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-8 pt-6 border-t border-gray-200 text-right">
                            <button type="button" id="openModalBtn" class="inline-block bg-[#272727] text-white font-semibold py-2 px-5 rounded-lg shadow hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-75 transition-colors">
                                <i class="bi bi-pencil-square mr-2"></i> Alterar Dados
                            </button>
                        </div>
                    </div>
                </details>
            </div>

            <!-- Aba 2: Estrutura Organizacional -->
            <div id="estrutura" class="tab-content hidden p-4 space-y-6">
                <!-- Card para Gerenciar Cargos -->
                <div class="bg-white rounded-xl shadow-2xl poppins-regular">
                    <div class="px-6 py-5">
                        <h3 class="text-xl font-bold text-[#272727]"><i class="bi bi-person-badge"></i> Gerenciar Cargos</h3>
                        <p class="mt-2 text-gray-600">Adicione, edite e remova os cargos dos servidores da sua instituição.</p>
                        <div class="mt-6">
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center">
                                <p class="text-gray-500">O formulário e a tabela para o CRUD de Cargos serão adicionados aqui.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card para Gerenciar Departamentos -->
                <div class="bg-white rounded-xl shadow-2xl poppins-regular">
                    <div class="px-6 py-5">
                        <h3 class="text-xl font-bold text-[#272727]"><i class="bi bi-door-open-fill"></i> Gerenciar Departamentos</h3>
                        <p class="mt-2 text-gray-600">Adicione, edite e remova os departamentos da sua instituição.</p>
                        <div class="mt-6">
                            <form action="{{ route('configuracoes.departamentos.store') }}#tabela-departamentos" method="POST" id="formDepartamentos">
                                @csrf
                                <div class="space-y-4">
                                    <div>
                                        <label for="nomeDepartamento" class="block text-sm font-bold text-gray-700 mb-1">Nome do Departamento<span class="text-red-600">*</span></label>
                                        <input type="text" name="nomeDepartamento" id="nomeDepartamento" class="w-full px-3 py-2 border border-black rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500" placeholder="Ex: Secretaria Acadêmica" required>
                                    </div>
                                    <div>
                                        <label for="descricaoDepartamento" class="block text-sm font-bold text-gray-700 mb-1">Descrição (Opcional)</label>
                                        <textarea name="descricaoDepartamento" id="descricaoDepartamento" rows="3" class="w-full px-3 py-2 border border-black rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500" placeholder="Descreva as responsabilidades do departamento..."></textarea>
                                    </div>
                                </div>
                                <div class="mt-6 text-right">
                                    <button type="button" id="btnLimparCamposDepartamentos" class="cursor-pointer bg-gray-300 hover:bg-red-200 text-[#272727] py-2 px-4 rounded-lg mr-5"><i class="bi bi-eraser-fill"></i> Limpar Campos</button>
                                    <button type="submit" class="inline-block bg-[#272727] text-white font-semibold py-2 px-5 rounded-lg shadow hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-75 transition-colors">
                                        <i class="bi bi-floppy mr-2"></i>Salvar Departamento
                                    </button>
                                </div>
                            </form>

                            <hr class="my-8 border-gray-300">
                            <div>
                                <h4 class="text-lg font-bold text-gray-800 mb-4"><i class="bi bi-door-open-fill"></i> Departamentos Cadastrados</h4>
                                <div class="overflow-x-auto">
                                    <table class="min-w-full bg-white" id="tabela-departamentos">
                                        <thead class="bg-[#272727] text-white">
                                        <tr>
                                            <th class="py-3 px-4 text-left text-sm font-semibold uppercase">ID</th>
                                            <th class="py-3 px-4 text-left text-sm font-semibold uppercase">Nome do Departamento</th>
                                            <th class="py-3 px-4 text-center text-sm font-semibold uppercase">Ações</th>
                                        </tr>
                                        </thead>
                                        <tbody class="text-gray-700">
                                        @forelse ($departamentos as $departamento)
                                            <tr class="border-b hover:bg-gray-100">
                                                <td class="py-3 px-4">{{ $departamento->id }}</td>
                                                <td class="py-3 px-4">{{ $departamento->nomeDepartamento }}</td>
                                                <td class="py-3 px-4 text-center">
                                                    <div class="flex justify-center items-center gap-2">
                                                        <a href="{{ route('configuracoes.departamentos.edit', ['departamento' => $departamento->id]) }}" class="text-blue-600 hover:text-blue-900" title="Alterar Departamento">
                                                            <i class="bi bi-pencil-square text-lg"></i>
                                                        </a>
                                                        <form action="{{ route('configuracoes.departamentos.destroy', ['departamento' => $departamento->id]) }}" method="POST" onsubmit="return confirm('Tem a certeza de que deseja apagar este departamento?');" class="inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="text-red-600 hover:text-red-900" title="Apagar Departamento">
                                                                <i class="bi bi-trash-fill text-lg"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="py-4 px-4 text-center text-gray-500">
                                                    Nenhum departamento cadastrado ainda.
                                                </td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Aba 3: Sobre o Sistema -->
            <div id="sobre" class="tab-content hidden p-4 space-y-6">
                <div class="bg-white rounded-xl shadow-2xl poppins-regular">
                    <div class="px-6 py-5">
                        <h3 class="text-xl font-bold text-[#272727]"><i class="bi bi-info-circle"></i> Sobre o Sistema</h3>
                        <br>
                        <p><i class="bi bi-git"></i> Versão Atual: 1.0 (alpha)</p>
                        <p><i class="bi bi-calendar-date"></i> Lançamento: 2025</p>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-2xl poppins-regular">
                    <div class="px-6 py-5">
                        <h3 class="text-xl font-bold text-[#272727]"><i class="bi bi-file-text"></i> Documentação</h3>
                        <br>
                        <p>Caso possua alguma dúvida em como gerenciar sua Instituição de Ensino pelo Scholarium, não exite em consultar nosso Manual do Usuário disponível para download no botão abaixo.</p>
                        <br>
                        <a href="{{ asset('downloads/manual_do_usuario.pdf') }}" download class="inline-block bg-[#272727] text-white font-semibold py-2 px-5 rounded-lg shadow hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-opacity-75 transition-colors">
                            <i class="bi bi-download mr-2"></i>Baixar Manual do Usuário
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL DE EDIÇÃO (Fica fora das abas) -->
<div id="editModal" class="fixed hidden inset-0 bg-black/30 backdrop-blur-sm z-40 flex items-center justify-center p-4 transition-opacity duration-300" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="bg-white rounded-lg shadow-2xl w-full max-w-3xl transform transition-all duration-300 overflow-hidden">
        <div class="flex items-center justify-between px-6 py-4 border-b">
            <h3 class="text-2xl font-medium text-gray-900 poppins-semibold" id="modal-title"><i class="bi bi-pencil-square mr-2"></i> Alteração de Dados</h3>
            <button id="closeModalBtn" class="text-gray-400 hover:text-gray-600 text-2xl font-bold leading-none">&times;</button>
        </div>
        <form action="{{ route('instituicao.configuracoes.update') }}" method="POST" id="alterInstituicaoForm">
            @csrf
            @method('PUT')
            <div class="p-6 space-y-6 max-h-[70vh] overflow-y-auto">
                <h2 class="text-md font-bold text-[#272727]"><i class="bi bi-buildings"></i> Dados da Instituição</h2>
                <hr>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label for="nomeInstituicao" class="block text-sm font-medium text-gray-700"><i class="bi bi-alphabet"></i> Nome da Instituição</label>
                        <input type="text" name="nomeInstituicao" id="nomeInstituicao" value="{{ old('nomeInstituicao', $instituicao->nomeInstituicao) }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500" required>
                        @error('nomeInstituicao')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="cnpjInstituicao" class="block text-sm font-medium text-gray-700"><i class="bi bi-hash"></i> CNPJ</label>
                        <input type="text" name="cnpjInstituicao" id="cnpjInstituicao" value="{{ old('cnpjInstituicao', $instituicao->cnpjInstituicao) }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500" required>
                        @error('cnpjInstituicao')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="telefoneInstituicao" class="block text-sm font-medium text-gray-700"><i class="bi bi-telephone"></i> Telefone</label>
                        <input type="text" name="telefoneInstituicao" id="telefoneInstituicao" value="{{ old('telefoneInstituicao', $instituicao->telefoneInstituicao) }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500" required>
                        @error('telefoneInstituicao')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div class="md:col-span-2">
                        <label for="emailInstituicao" class="block text-sm font-medium text-gray-700"><i class="bi bi-envelope-at"></i> E-mail</label>
                        <input type="email" name="emailInstituicao" id="emailInstituicao" value="{{ old('emailInstituicao', $instituicao->emailInstituicao) }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500" required>
                        @error('emailInstituicao')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>
                <h2 class="text-md font-bold text-[#272727]"><i class="bi bi-geo-alt"></i> Endereço da Instituição</h2>
                <hr>
                <div class="grid grid-cols-1 md:grid-cols-6 gap-6">
                    <div class="md:col-span-2">
                        <label for="cepInstituicao" class="block text-sm font-medium text-gray-700"><i class="bi bi-signpost-split"></i> CEP</label>
                        <input type="text" name="cepInstituicao" id="cepInstituicao" value="{{ old('cepInstituicao', $instituicao->cepInstituicao) }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500" required>
                        @error('cepInstituicao')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div class="md:col-span-4">
                        <label for="logradouroInstituicao" class="block text-sm font-medium text-gray-700"><i class="bi bi-signpost-split"></i> Logradouro</label>
                        <input type="text" name="logradouroInstituicao" id="logradouroInstituicao" value="{{ old('logradouroInstituicao', $instituicao->logradouroInstituicao) }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg bg-gray-100" required readonly>
                        @error('logradouroInstituicao')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div class="md:col-span-2">
                        <label for="numeroInstituicao" class="block text-sm font-medium text-gray-700"><i class="bi bi-123"></i> Número</label>
                        <input type="text" name="numeroInstituicao" id="numeroInstituicao" value="{{ old('numeroInstituicao', $instituicao->numeroInstituicao) }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500" required maxlength="4">
                        @error('numeroInstituicao')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div class="md:col-span-3">
                        <label for="cidadeInstituicao" class="block text-sm font-medium text-gray-700"><i class="bi bi-geo-alt"></i> Cidade</label>
                        <input type="text" name="cidadeInstituicao" id="cidadeInstituicao" value="{{ old('cidadeInstituicao', $instituicao->cidadeInstituicao) }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg bg-gray-100" required readonly>
                        @error('cidadeInstituicao')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div class="md:col-span-1">
                        <label for="ufInstituicao" class="block text-sm font-medium text-gray-700"><i class="bi bi-geo-alt"></i> UF</label>
                        <input type="text" name="ufInstituicao" id="ufInstituicao" value="{{ old('ufInstituicao', $instituicao->ufInstituicao) }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg bg-gray-100" required readonly maxlength="2">
                        @error('ufInstituicao')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>
            <div class="px-6 py-4 bg-gray-50 text-right space-x-3 border-t">
                <button type="button" id="cancelModalBtn" class="bg-white text-gray-700 font-semibold py-2 px-4 rounded-lg border border-gray-300 hover:bg-red-200 focus:outline-none focus:ring-2 cursor-pointer focus:ring-offset-2 focus:ring-gray-600 transition-colors"><i class="bi bi-x-circle"></i> Cancelar</button>
                <button type="submit" class="bg-[#272727] text-white font-semibold py-2 px-4 rounded-lg shadow hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 cursor-pointer transition-colors"><i class="bi bi-floppy"></i> Salvar Alterações</button>
            </div>
        </form>
    </div>
</div>

<!-- SCRIPT PARA CONTROLE DAS ABAS -->
<script src="{{ asset('js/tabsManager_Configuracoes.js') }}"></script>
<script src="{{ asset('js/resetInputFormCursos.js') }}"></script>

<!-- SCRIPT PARA O MODAL -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('editModal');
        const openBtn = document.getElementById('openModalBtn');
        const closeBtn = document.getElementById('closeModalBtn');
        const cancelBtn = document.getElementById('cancelModalBtn');

        const openModal = () => modal.classList.remove('hidden');
        const closeModal = () => modal.classList.add('hidden');

        openBtn.addEventListener('click', openModal);
        closeBtn.addEventListener('click', closeModal);
        cancelBtn.addEventListener('click', closeModal);
        modal.addEventListener('click', (event) => {
            if (event.target === modal) {
                closeModal();
            }
        });
        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape' && !modal.classList.contains('hidden')) {
                closeModal();
            }
        });
    });
</script>
</body>
</html>
