document.addEventListener('DOMContentLoaded', function() {
    // --- 1. SELEÇÃO DE TODOS OS ELEMENTOS ---
    // Elementos de Validação
    const senhaInput = document.getElementById('senhaInstituicao');
    const confirmaSenhaInput = document.getElementById('confirmaSenhaInstituicao');
    const senhaMensagem = document.getElementById('senhaMensagem');
    const confirmaSenhaMensagem = document.getElementById('confirmaSenhaMensagem');

    // Elementos do Botão de Visualizar Senha
    const toggleSenhaButton = document.getElementById('toggleSenha');
    const eyeIconSenha = document.getElementById('eyeIconSenha');
    const toggleConfirmaSenhaButton = document.getElementById('toggleConfirmaSenha');
    const eyeIconConfirmaSenha = document.getElementById('eyeIconConfirmaSenha');

    const senhaRegExp = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

    // --- 2. FUNÇÕES ---

    // Suas funções de validação (sem alterações)
    function validarSenha() {
        if (senhaRegExp.test(senhaInput.value)) {
            senhaMensagem.classList.add('hidden');
        } else {
            senhaMensagem.classList.remove('hidden');
        }
    }

    function validarConfirmaSenha() {
        if (senhaInput.value === confirmaSenhaInput.value) {
            confirmaSenhaMensagem.classList.add('hidden');
        } else {
            confirmaSenhaMensagem.classList.remove('hidden');
        }
    }

    // Função para configurar a visibilidade da senha
    function configurarBotaoVisualizar(input, button, icon) {
        if (input && button && icon) {
            button.addEventListener('click', function() {
                const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                input.setAttribute('type', type);

                if (type === 'password') {
                    icon.classList.remove('bi-eye-fill');
                    icon.classList.add('bi-eye-slash-fill');
                } else {
                    icon.classList.remove('bi-eye-slash-fill');
                    icon.classList.add('bi-eye-fill');
                }
            });
        }
    }

    // --- 3. INICIALIZAÇÃO DOS EVENTOS ---

    // Adiciona os eventos de 'input' para validação em tempo real
    if (senhaInput) {
        senhaInput.addEventListener('input', function() {
            validarSenha();
            validarConfirmaSenha(); // Valida a confirmação sempre que a senha principal muda
        });
    }

    if (confirmaSenhaInput) {
        confirmaSenhaInput.addEventListener('input', validarConfirmaSenha);
    }

    // Configura a funcionalidade de "ver senha" para ambos os campos
    configurarBotaoVisualizar(senhaInput, toggleSenhaButton, eyeIconSenha);
    configurarBotaoVisualizar(confirmaSenhaInput, toggleConfirmaSenhaButton, eyeIconConfirmaSenha);
});
