// Importa a biblioteca Inputmask
import Inputmask from 'inputmask';

// Aguarda o DOM carregar
document.addEventListener('DOMContentLoaded', function () {
    // Seleciona o campo de telefone
    const telefoneInput = document.getElementById('telefoneInstituicao');

    // Aplica a máscara de telefone
    Inputmask({
        mask: '(##) # ####-####', // Máscara para telefone fixo
        placeholder: '_', // Caractere de placeholder
        showMaskOnHover: false, // Não mostrar a máscara ao passar o mouse
    }).mask(telefoneInput);
});