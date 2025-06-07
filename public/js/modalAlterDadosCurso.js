document.addEventListener('DOMContentLoaded', () => {
    const editButtons = document.querySelectorAll('.edit-button');
    const editForm = document.getElementById('edit-form');
    const editModal = document.getElementById('edit-modal');

    editButtons.forEach(button => {
        button.addEventListener('click', async () => {
            const fetchUrl = button.dataset.fetchUrl;
            const updateUrl = button.dataset.updateUrl;

            if (!fetchUrl || !updateUrl) {
                console.error('URLs não definidas corretamente nos atributos data-* do botão.');
                return;
            }

            try {
                // Define a ação (action) do formulário de edição
                editForm.action = updateUrl;

                // Faz a requisição para obter os dados do curso
                const response = await fetch(fetchUrl);

                if (!response.ok) {
                    throw new Error(`Erro ao buscar os dados do curso. Status: ${response.status}`);
                }

                const data = await response.json();

                // Preenche os campos do formulário com os dados recebidos
                document.getElementById('edit-nomeCurso').value = data.nomeCurso ?? '';
                document.getElementById('edit-nivelCurso').value = data.nivelCurso ?? '';
                document.getElementById('edit-descricaoCurso').value = data.descricaoCurso ?? '';
                document.getElementById('edit-statusCurso').value = data.statusCurso ?? '';

                // Exibe o modal
                editModal.classList.remove('hidden');
            } catch (error) {
                console.error('Erro ao abrir o modal de edição:', error);
                alert('Ocorreu um erro ao tentar carregar os dados. Tente novamente.');
            }
        });
    });
});
