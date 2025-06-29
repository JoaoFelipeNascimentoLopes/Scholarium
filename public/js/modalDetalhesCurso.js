document.addEventListener('DOMContentLoaded', function () {
    // --- 1. Seleção dos Elementos do DOM ---
    // Selecionamos todos os elementos que vamos manipular uma única vez para melhor performance.
    const modal = document.getElementById('detailsModal');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const viewDetailsBtns = document.querySelectorAll('.view-details-btn');

    // Selecionamos os 'spans' do modal que serão preenchidos
    const modalId = document.getElementById('modal-id');
    const modalNomeCurso = document.getElementById('modal-nomeCurso');
    const modalNivelCurso = document.getElementById('modal-nivelCurso');
    const modalDescricaoCurso = document.getElementById('modal-descricaoCurso');
    const modalStatusCurso = document.getElementById('modal-statusCurso');
    const modalPeriodos = document.getElementById('modal-curso-periodos');
    const modalTotalDisciplinas = document.getElementById('modal-totalDisciplinas');
    const modalCreatedAt = document.getElementById('modal-createdAt');
    const modalUpdatedAt = document.getElementById('modal-updatedAt');


    // --- 2. Função Auxiliar para Formatar Datas ---
    function formatarData(dataString) {
        if (!dataString) return 'N/A'; // Lida com datas nulas
        const data = new Date(dataString);
        return data.toLocaleDateString('pt-BR', {
            day: '2-digit', month: '2-digit', year: 'numeric',
            hour: '2-digit', minute: '2-digit'
        });
    }

    // --- 3. Lógica Principal: Abrir o Modal e Buscar Dados ---
    viewDetailsBtns.forEach(button => {
        // A função do evento de clique agora é 'async' para permitir o uso do 'await'.
        button.addEventListener('click', async function () {
            // Pega os dados básicos do curso que já foram carregados na página.
            const cursoData = JSON.parse(this.dataset.curso);

            // a) Preenche imediatamente os dados que já temos.
            modalId.textContent = cursoData.id;
            modalNomeCurso.textContent = cursoData.nomeCurso;
            modalNivelCurso.textContent = cursoData.nivelCurso;
            modalDescricaoCurso.textContent = cursoData.descricaoCurso || 'Nenhuma descrição fornecida.';
            modalCreatedAt.textContent = formatarData(cursoData.created_at);
            modalUpdatedAt.textContent = formatarData(cursoData.updated_at);

            // b) Preenche o badge de status.
            if (cursoData.statusCurso === 'ativo') {
                modalStatusCurso.innerHTML = '<span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Ativo</span>';
            } else {
                modalStatusCurso.innerHTML = '<span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Inativo</span>';
            }
            // Depois (Correto para a sua tabela)
            modalPeriodos.textContent = cursoData.periodosCurso || 'Não informado';
            // c) Mostra um estado de "carregando" para a contagem de disciplinas.
            modalTotalDisciplinas.textContent = 'Carregando...';

            // d) Exibe o modal para o usuário.
            modal.classList.remove('hidden');

            // e) FAZ A CONSULTA EM TEMPO REAL para buscar a contagem de disciplinas.
            try {
                // Chama a rota da API que criamos.
                const response = await fetch(`/cursos/${cursoData.id}/total-disciplinas`);
                if (!response.ok) { // Verifica se a requisição teve sucesso (código 2xx)
                    throw new Error(`Erro na rede: ${response.statusText}`);
                }
                const data = await response.json();

                // Atualiza o campo no modal com o resultado da consulta.
                modalTotalDisciplinas.textContent = data.total_disciplinas;

            } catch (error) {
                // Em caso de erro na rede ou na API, exibe uma mensagem de erro.
                console.error('Erro ao buscar o total de disciplinas:', error);
                modalTotalDisciplinas.textContent = 'Erro ao carregar';
            }
        });
    });

    // --- 4. Lógica para Fechar o Modal ---
    function closeModal() {
        modal.classList.add('hidden');
    }

    // Evento de clique para o botão de fechar (X)
    closeModalBtn.addEventListener('click', closeModal);

    // Evento de clique para fechar o modal ao clicar na área escura de fundo
    modal.addEventListener('click', function (event) {
        if (event.target === modal) {
            closeModal();
        }
    });

    // Evento para fechar o modal ao pressionar a tecla 'Escape'
    document.addEventListener('keydown', function (event) {
        if (event.key === "Escape" && !modal.classList.contains('hidden')) {
            closeModal();
        }
    });
});
