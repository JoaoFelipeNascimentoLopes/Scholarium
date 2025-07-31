document.addEventListener('DOMContentLoaded', function() {
    const passwordInput = document.getElementById('senhaLogin');
    const togglePasswordButton = document.getElementById('togglePassword');
    const eyeIcon = document.getElementById('eyeIcon');

    // Garante que os elementos existem antes de adicionar o evento
    if (passwordInput && togglePasswordButton && eyeIcon) {
        togglePasswordButton.addEventListener('click', function() {
            // Verifica o tipo atual do input
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            // Troca o ícone do olho (aberto/fechado)
            if (type === 'password') {
                eyeIcon.classList.remove('bi-eye-fill');
                eyeIcon.classList.add('bi-eye-slash-fill');
            } else {
                eyeIcon.classList.remove('bi-eye-slash-fill');
                eyeIcon.classList.add('bi-eye-fill');
            }
        });
    }
});
