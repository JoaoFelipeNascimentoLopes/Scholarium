document.addEventListener('DOMContentLoaded', function() {
    const btnLimpar = document.getElementById('btnLimparCampos');
    const form = document.getElementById('formCurso');

    // Esta verificação impede erros em outras páginas
    if (btnLimpar && form) { 
        btnLimpar.addEventListener('click', function() {
            form.reset();
        });
    }
});