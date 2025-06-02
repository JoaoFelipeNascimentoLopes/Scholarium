// resources/js/sidebar.js

// Função para inicializar a lógica da sidebar
function initializeSidebar() {
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('main-content');
    const hamburgerButton = document.getElementById('hamburger-button');
    const hamburgerButtonDesktop = document.getElementById('hamburger-button-desktop');

    // Verifica se todos os elementos essenciais existem antes de prosseguir
    if (!sidebar || !mainContent) {
        // console.warn("Sidebar ou Main Content não encontrados. Funcionalidade da sidebar não será iniciada.");
        return;
    }

    // Estado inicial da sidebar (aberta por padrão)
    // A verificação de classes é mais robusta para o estado inicial do que uma variável JS isolada
    // se o HTML já define o estado visual.
    // No entanto, manteremos a variável para a lógica de toggle.
    let isSidebarOpen = !sidebar.classList.contains('-translate-x-full');

    function toggleSidebar() {
        isSidebarOpen = !isSidebarOpen;
        if (isSidebarOpen) {
            sidebar.classList.remove('-translate-x-full');
            if (mainContent) { // Verifica se mainContent existe
                mainContent.classList.remove('ml-0');
                mainContent.classList.add('ml-64'); // Largura da sidebar
            }
        } else {
            sidebar.classList.add('-translate-x-full');
            if (mainContent) { // Verifica se mainContent existe
                mainContent.classList.remove('ml-64');
                mainContent.classList.add('ml-0');
            }
        }
    }

    if (hamburgerButton) {
        hamburgerButton.addEventListener('click', toggleSidebar);
    } else {
        // console.warn("Botão Hamburguer (mobile) não encontrado.");
    }

    if (hamburgerButtonDesktop) {
        hamburgerButtonDesktop.addEventListener('click', toggleSidebar);
    } else {
        // console.warn("Botão Hamburguer (desktop) não encontrado.");
    }

    // Opcional: Ajustar o estado inicial com base no tamanho da tela
    // if (window.innerWidth < 768 && isSidebarOpen) { // md breakpoint in Tailwind
    //    toggleSidebar(); // Começa fechada em mobile se estiver aberta
    // }
}

// Garante que o DOM esteja carregado antes de tentar manipular os elementos
document.addEventListener('DOMContentLoaded', initializeSidebar);