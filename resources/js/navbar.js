const hamburgerIcon = document.getElementById('hamburger-icon');
  const mobileMenu = document.getElementById('mobile-menu');

  hamburgerIcon.addEventListener('click', () => {
    // Alterna a visibilidade do menu responsivo
    mobileMenu.classList.toggle('hidden');
  });