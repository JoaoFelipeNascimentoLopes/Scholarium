
    document.addEventListener('DOMContentLoaded', function () {
    // --- 1. SELEÇÃO DOS ELEMENTOS DO DOM ---
    const modal = document.getElementById('detailsModal');
    // Se o modal não existir nesta página, o script para aqui.
    if (!modal) return;

    const closeModalBtn = document.getElementById('closeModalBtn');
    const viewDetailsBtns = document.querySelectorAll('.view-details-btn');

    // Seleciona todos os <span>s onde os dados serão exibidos
    const modalId = document.getElementById('modal-id');
    const modalNomeCurso = document.getElementById('modal-nomeCurso');
    const modalNivelCurso = document.getElementById('modal-nivelCurso');
    const modalFormatoCurso = document.getElementById('modal-formatoCurso');
    const modalPeriodos = document.getElementById('modal-curso-periodos');
    const modalCargaTotal = document.getElementById('modal-curso-carga-total');
    const modalDescricaoCurso = document.getElementById('modal-descricaoCurso');
    const modalStatusCurso = document.getElementById('modal-statusCurso');
    const modalCreatedAt = document.getElementById('modal-createdAt');
    const modalUpdatedAt = document.getElementById('modal-updatedAt');
    const disciplinasContainer = document.getElementById('modal-disciplinas-container');


    // --- 2. FUNÇÃO AUXILIAR PARA FORMATAR DATAS ---
    function formatarData(dataString) {
    if (!dataString) return 'N/A';
    const data = new Date(dataString);
    return data.toLocaleDateString('pt-BR', {
    day: '2-digit', month: '2-digit', year: 'numeric',
    hour: '2-digit', minute: '2-digit'
});
}

    // --- 3. LÓGICA PRINCIPAL: ABRIR O MODAL E BUSCAR DADOS ---
    viewDetailsBtns.forEach(button => {
    button.addEventListener('click', async function () {
    // Pega os dados básicos do curso que já foram pré-carregados no botão
    const cursoData = JSON.parse(this.dataset.curso);

    // a) Preenche imediatamente os dados estáticos do curso
    modalId.textContent = cursoData.id;
    modalNomeCurso.textContent = cursoData.nomeCurso;
    modalNivelCurso.textContent = cursoData.nivelCurso;
    modalFormatoCurso.textContent = cursoData.formatoCurso;
    modalPeriodos.textContent = cursoData.periodosCurso ? `${cursoData.periodosCurso} períodos` : 'Não informado';
    modalDescricaoCurso.textContent = cursoData.descricaoCurso || 'Nenhuma descrição fornecida.';
    modalCreatedAt.textContent = formatarData(cursoData.created_at);
    modalUpdatedAt.textContent = formatarData(cursoData.updated_at);

    // b) Preenche o badge de status
    if (cursoData.statusCurso.toLowerCase() === 'ativo') {
    modalStatusCurso.innerHTML = `<span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Ativo</span>`;
} else {
    modalStatusCurso.innerHTML = `<span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Inativo</span>`;
}

    // c) Mostra um estado de "carregando" para os dados dinâmicos
    modalCargaTotal.textContent = 'Calculando...';
    disciplinasContainer.innerHTML = '<p class="p-4 text-center text-gray-500">Carregando disciplinas...</p>';

    // d) Exibe o modal
    modal.classList.remove('hidden');

    // e) FAZ A CONSULTA EM TEMPO REAL para buscar a Carga Total e as Disciplinas
    try {
    // Chama a rota da API que retorna o JSON completo
    const response = await fetch(`/api/cursos/${cursoData.id}/disciplinas`);
    if (!response.ok) throw new Error('Falha ao carregar detalhes do curso.');

    const data = await response.json();

    // Pega os dados da resposta da API
    const cargaTotal = data.carga_horaria_total;
    const periodos = data.periodos;

    // f) Exibe a carga horária total formatada
    modalCargaTotal.textContent = `${cargaTotal} horas`;

    // g) Constrói as tabelas de disciplinas
    disciplinasContainer.innerHTML = ''; // Limpa a mensagem de "carregando"

    if (Object.keys(periodos).length > 0) {
    for (const periodoNumero in periodos) {
    const disciplinasDoPeriodo = periodos[periodoNumero];

    // Cria o título do período
    const tituloPeriodo = document.createElement('h5');
    tituloPeriodo.className = 'font-bold text-md text-white p-2 bg-[#272727] border-b';
    tituloPeriodo.textContent = periodoNumero ? `${periodoNumero}º Período/Ano` : 'Período não definido';
    disciplinasContainer.appendChild(tituloPeriodo);

    // Cria a tabela para este período
    const table = document.createElement('table');
    table.className = 'w-full text-sm';
    table.innerHTML = `
                            <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                                <tr>
                                    <th class="p-2 text-left">ID</th>
                                    <th class="p-2 text-left w-64">Disciplina</th>
                                    <th class="p-2 text-center w-16">Carga</th>
                                    <th class="p-2 text-center w-16">Ementa</th>
                                </tr>
                            </thead>`;

    const tbody = document.createElement('tbody');
    disciplinasDoPeriodo.forEach(disciplina => {
    const tr = document.createElement('tr');
    tr.className = 'border-t border-gray-200';
    let ementaHtml = '<span class="text-gray-400">N/A</span>';
    if (disciplina.ementaDisciplina) {
    const ementaUrl = `/storage/${disciplina.ementaDisciplina}`;
    ementaHtml = `<a href="${ementaUrl}" target="_blank" class="text-[#272727] hover:underline" title="Baixar Ementa"><i class="bi bi-file-earmark-arrow-down-fill text-lg"></i></a>`;
}
    tr.innerHTML = `
                                <td class="p-2 text-left w-3">${disciplina.id}</td>
                                <td class="p-2 text-left">${disciplina.nomeDisciplina}</td>
                                <td class="p-2 text-center">${disciplina.cargaDisciplina}h</td>
                                <td class="p-2 text-center">${ementaHtml}</td>
                            `;
    tbody.appendChild(tr);
});

    table.appendChild(tbody);
    disciplinasContainer.appendChild(table);
}
} else {
    disciplinasContainer.innerHTML = '<p class="p-4 text-center text-gray-500">Nenhuma disciplina ativa encontrada para este curso.</p>';
}

} catch (error) {
    console.error('Erro ao buscar os detalhes do curso:', error);
    modalCargaTotal.textContent = 'Erro';
    disciplinasContainer.innerHTML = '<p class="p-4 text-center text-red-500">Erro ao carregar as disciplinas.</p>';
}
});
});

    // --- 4. LÓGICA PARA FECHAR O MODAL ---
    function closeModal() {
    modal.classList.add('hidden');
}
    closeModalBtn.addEventListener('click', closeModal);
    modal.addEventListener('click', (event) => (event.target === modal) && closeModal());
    document.addEventListener('keydown', (event) => (event.key === "Escape" && !modal.classList.contains('hidden')) && closeModal());
});
