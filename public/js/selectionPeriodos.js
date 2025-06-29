 document.addEventListener('DOMContentLoaded', function () {
    const cursoSelect = document.getElementById('cursoDisciplina');
    const periodoSelect = document.getElementById('periodoDisciplina');

    if (cursoSelect && periodoSelect) {
    cursoSelect.addEventListener('change', function () {
    const selectedOption = this.options[this.selectedIndex];
    const totalPeriodos = parseInt(selectedOption.dataset.periodos) || 0;

    // Limpa as opções antigas
    periodoSelect.innerHTML = '';

    if (totalPeriodos > 0) {
    periodoSelect.disabled = false;
    periodoSelect.classList.remove('bg-gray-200', 'cursor-not-allowed');

    // Cria o placeholder desabilitado
    const placeholderOption = document.createElement('option');
    placeholderOption.value = '';
    placeholderOption.textContent = 'Selecione o período...';
    placeholderOption.disabled = true;
    placeholderOption.selected = true;
    periodoSelect.add(placeholderOption);

    // Adiciona as opções de período válidas
    for (let i = 1; i <= totalPeriodos; i++) {
    const option = new Option(`${i}º Período`, i);
    periodoSelect.add(option);
}
} else {
    periodoSelect.disabled = true;
    periodoSelect.classList.add('bg-gray-200', 'cursor-not-allowed');
    periodoSelect.add(new Option('Disponível após a seleção de curso', ''));
}
});
}
});
