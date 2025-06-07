import Inputmask from "inputmask";

document.addEventListener('DOMContentLoaded', function () {
    // Seleciona o campo de cnpj
    const cnpjInput = document.getElementById('cnpjInstituicao');

    // Aplica a máscara de cnpj
    Inputmask({
        mask: '##.###.###/####-##', // Máscara para cnpj
        placeholder: '_', // Caractere de placeholder
        showMaskOnHover: false, // Não mostrar a máscara ao passar o mouse
    }).mask(cnpjInput);
});
