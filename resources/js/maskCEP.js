import Inputmask from "inputmask";

document.addEventListener('DOMContentLoaded', function () {
    // Seleciona o campo de cep
    const cepInput = document.getElementById('cepInstituicao');
    console.log("Mascara Carregada");
    // Aplica a máscara de cep
    Inputmask({
        mask: '##.###-###', // Máscara para cep
        placeholder: '_', // Caractere de placeholder
        showMaskOnHover: false, // Não mostrar a máscara ao passar o mouse
    }).mask(cepInput);
});
