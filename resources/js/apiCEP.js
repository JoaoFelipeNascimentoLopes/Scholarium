document.getElementById('cepInstituicao').addEventListener('blur', function() {
    // Obtém o CEP inserido pelo usuário
    let cep = this.value.replace(/\D/g, ''); // Remove caracteres não numéricos
    
    if (cep !== "") {
        // Valida se o CEP tem o formato correto
        let validacep = /^[0-9]{8}$/;
        
        if (validacep.test(cep)) {
            // Faz a requisição à API ViaCEP
            fetch(`https://viacep.com.br/ws/${cep}/json/`)
                .then(response => response.json())
                .then(data => {
                    if (!data.erro) {
                        // Preenche os campos automaticamente com as informações do CEP
                        document.getElementById('logradouroInstituicao').value = data.logradouro;
                        document.getElementById('cidadeInstituicao').value = data.localidade;
                        document.getElementById('ufInstituicao').value = data.uf;
                    } else {
                        alert("CEP não encontrado.");
                    }
                })
                .catch(error => {
                    console.error('Erro ao consultar o CEP:', error);
                    alert('Erro ao consultar o CEP. Tente novamente mais tarde.');
                });
        } else {
            alert("CEP inválido.");
        }
    } else {
        alert("Por favor, insira um CEP.");
    }
});