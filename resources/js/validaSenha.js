document.addEventListener('DOMContentLoaded', function() {
    const senhaInput = document.getElementById('senhaInstituicao');
    const confirmaSenhaInput = document.getElementById('confirmaSenhaInstituicao');
    const senhaMensagem = document.getElementById('senhaMensagem');
    const confirmaSenhaMensagem = document.getElementById('confirmaSenhaMensagem');

    // Regex para validar os critérios da senha
    const senhaRegExp = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

    // Função de validação da senha
    function validarSenha() {
        const senha = senhaInput.value;

        if (senhaRegExp.test(senha)) {
            senhaMensagem.classList.add('hidden');  // Esconde a mensagem de erro se a senha for válida
        } else {
            senhaMensagem.classList.remove('hidden');  // Exibe a mensagem de erro se a senha for inválida
        }
    }

    // Função de validação de confirmação de senha
    function validarConfirmaSenha() {
        const senha = senhaInput.value;
        const confirmaSenha = confirmaSenhaInput.value;

        if (senha === confirmaSenha) {
            confirmaSenhaMensagem.classList.add('hidden');  // Esconde a mensagem de erro se as senhas corresponderem
        } else {
            confirmaSenhaMensagem.classList.remove('hidden');  // Exibe a mensagem de erro se as senhas não corresponderem
        }
    }

    // Adiciona os eventos de 'input' para validação em tempo real
    senhaInput.addEventListener('input', function() {
        validarSenha();
        validarConfirmaSenha();
    });

    confirmaSenhaInput.addEventListener('input', function() {
        validarConfirmaSenha();
    });
});
