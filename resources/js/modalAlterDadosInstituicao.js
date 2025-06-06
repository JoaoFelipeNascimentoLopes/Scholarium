// Espera o conteúdo da página carregar completamente antes de rodar o script
    document.addEventListener('DOMContentLoaded', () => {
        // Pega os elementos do HTML que vamos manipular
        const modal = document.getElementById('editModal');
        const openBtn = document.getElementById('openModalBtn');
        const closeBtn = document.getElementById('closeModalBtn');
        const cancelBtn = document.getElementById('cancelModalBtn');

        // Função para abrir o modal
        const openModal = () => {
            if (modal) {
                modal.classList.remove('hidden'); // Mostra o modal
                modal.classList.add('flex');
            }
        };

        // Função para fechar o modal
        const closeModal = () => {
            if (modal) {
                modal.classList.add('hidden'); // Esconde o modal
                modal.classList.remove('flex');
            }
        };

        // Adiciona os eventos de clique aos botões
        // Verifica se os botões existem na página antes de adicionar o evento
        if (openBtn) {
            openBtn.addEventListener('click', openModal);
        }
        if (closeBtn) {
            closeBtn.addEventListener('click', closeModal);
        }
        if (cancelBtn) {
            cancelBtn.addEventListener('click', closeModal);
        }

        // Evento para fechar o modal ao clicar no fundo escuro
        if (modal) {
            modal.addEventListener('click', (event) => {
                if (event.target === modal) {
                    closeModal();
                }
            });
        }

        // Evento para fechar o modal com a tecla 'Escape'
        document.addEventListener('keydown', (event) => {
            if (!modal.classList.contains('hidden') && event.key === "Escape") {
                closeModal();
            }
        });
    });