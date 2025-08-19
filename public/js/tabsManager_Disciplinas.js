document.addEventListener('DOMContentLoaded', function () {
    const tabButtons = document.querySelectorAll('.tab-button');
    const tabContents = document.querySelectorAll('.tab-content');
    const urlParams = new URLSearchParams(window.location.search);
    let activeTab = urlParams.get('tab') || 'painel';

    window.openTab = function(evt, tabName) {
        tabContents.forEach(content => content.style.display = 'none');
        tabButtons.forEach(button => {
            button.classList.remove('border-gray-800', 'text-gray-800', 'font-bold');
            button.classList.add('border-transparent', 'hover:text-gray-600', 'hover:border-gray-300');
        });
        document.getElementById(tabName).style.display = 'block';
        const currentButton = evt.currentTarget || document.querySelector(`.tab-button[onclick*="'${tabName}'"]`);
        currentButton.classList.add('border-gray-800', 'text-gray-800', 'font-bold');
        currentButton.classList.remove('border-transparent', 'hover:text-gray-600', 'hover:border-gray-300');
    }

    const initialButton = document.querySelector(`.tab-button[onclick*="'${activeTab}'"]`);
    if (initialButton) {
        initialButton.click();
    } else {
        document.querySelector('.tab-button').click();
    }
});
