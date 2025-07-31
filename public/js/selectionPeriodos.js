document.addEventListener('DOMContentLoaded', function () {
    // 1. Seleciona os elementos
    const cursoSelect = document.getElementById('cursoDisciplina');
    const periodoSelect = document.getElementById('periodoDisciplina');

    // Novos seletores para o campo de formato
    const tipoDisciplinaHidden = document.getElementById('tipoDisciplinaHidden');
    const tipoDisciplinaVisible = document.getElementById('tipoDisciplinaVisible');

    if (cursoSelect && periodoSelect && tipoDisciplinaHidden && tipoDisciplinaVisible) {
        // 2. Adiciona o evento de 'change'
        cursoSelect.addEventListener('change', function () {
            const selectedOption = this.options[this.selectedIndex];

            // --- LÓGICA PARA O FORMATO DO CURSO ---
            // Pega o formato do atributo 'data-formato'
            const formato = selectedOption.dataset.formato || '';
            // Preenche tanto o campo visível quanto o oculto
            tipoDisciplinaVisible.value = formato;
            tipoDisciplinaHidden.value = formato;

            // --- LÓGICA PARA O PERÍODO (que você já tem) ---
            const totalPeriodos = parseInt(selectedOption.dataset.periodos) || 0;
            periodoSelect.innerHTML = ''; // Limpa opções antigas

            if (totalPeriodos > 0) {
                periodoSelect.disabled = false;
                periodoSelect.classList.remove('bg-gray-200', 'cursor-not-allowed');

                const placeholder = new Option('Selecione o período...', '');
                placeholder.disabled = true;
                placeholder.selected = true;
                periodoSelect.add(placeholder);

                // Bônus: O texto muda para "Ano" ou "Período"
                const labelPeriodo = formato === 'Anual' ? 'Ano' : 'Período';
                for (let i = 1; i <= totalPeriodos; i++) {
                    periodoSelect.add(new Option(`${i}º ${labelPeriodo}`, i));
                }
            } else {
                periodoSelect.disabled = true;
                periodoSelect.classList.add('bg-gray-200', 'cursor-not-allowed');
                periodoSelect.add(new Option('Selecione um curso primeiro', ''));
            }
        });
    }
});
