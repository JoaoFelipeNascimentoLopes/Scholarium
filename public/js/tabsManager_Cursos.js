document.addEventListener('DOMContentLoaded', function () {
    const tabButtons = document.querySelectorAll('.tab-button');
    const tabContents = document.querySelectorAll('.tab-content');
    // Pega a aba da URL, se existir (ex: ?tab=gerenciamento)
    const urlParams = new URLSearchParams(window.location.search);
    let activeTab = urlParams.get('tab') || 'painel'; // Padrão é 'painel'

    function openTab(evt, tabName) {
        // Esconde todos os conteúdos
        tabContents.forEach(content => {
            content.style.display = 'none';
        });

        // Remove a classe ativa de todos os botões
        tabButtons.forEach(button => {
            button.classList.remove('border-gray-800', 'text-gray-800', 'font-bold');
            button.classList.add('border-transparent', 'hover:text-gray-600', 'hover:border-gray-300');
        });

        // Mostra o conteúdo da aba selecionada
        document.getElementById(tabName).style.display = 'block';

        // Adiciona a classe ativa ao botão clicado
        const currentButton = evt.currentTarget || document.querySelector(`.tab-button[onclick*="'${tabName}'"]`);
        currentButton.classList.add('border-gray-800', 'text-gray-800', 'font-bold');
        currentButton.classList.remove('border-transparent', 'hover:text-gray-600', 'hover:border-gray-300');
    }

    // Função global para ser chamada pelos botões
    window.openTab = openTab;

    // Ativa a aba correta ao carregar a página
    const initialButton = document.querySelector(`.tab-button[onclick*="'${activeTab}'"]`);
    if (initialButton) {
        initialButton.click();
    } else {
        // Se a aba da URL não existir, abre a primeira
        document.querySelector('.tab-button').click();
    }
});
