document.addEventListener('DOMContentLoaded', function () {

    // ===============================================
    // LÓGICA CONDICIONAL PARA EXIBIR O RESPONSÁVEL
    // ===============================================
    const dataNascimentoInput = document.getElementById('dataNasEstudante');
    const sessaoResponsavel = document.getElementById('sessaoResponsavel');
    const inputsResponsavel = sessaoResponsavel.querySelectorAll('input, select');

    dataNascimentoInput.addEventListener('change', function () {
        const dataNascimento = new Date(this.value);
        if (!this.value) {
            sessaoResponsavel.classList.add('hidden');
            inputsResponsavel.forEach(input => input.required = false);
            return;
        }

        const hoje = new Date();
        let idade = hoje.getFullYear() - dataNascimento.getFullYear();
        const m = hoje.getMonth() - dataNascimento.getMonth();

        if (m < 0 || (m === 0 && hoje.getDate() < dataNascimento.getDate())) {
            idade--;
        }

        if (idade < 18) {
            sessaoResponsavel.classList.remove('hidden');
            inputsResponsavel.forEach(input => input.required = true);
        } else {
            sessaoResponsavel.classList.add('hidden');
            inputsResponsavel.forEach(input => {
                input.required = false;
                // Opcional: Limpar os campos caso a data seja alterada para maior de 18
                // if (input.type !== 'select-one') input.value = '';
                // else input.selectedIndex = 0;
            });
        }
    });

    // ===============================================
    // LÓGICA PARA BUSCA DE ENDEREÇO VIA CEP (ViaCEP)
    // ===============================================
    const cepInput = document.getElementById('cepEstudante');

    cepInput.addEventListener('blur', function () {
        const cep = this.value.replace(/\D/g, ''); // Remove caracteres não numéricos

        if (cep.length !== 8) {
            return; // CEP inválido
        }

        // Exibe feedback de carregamento
        setEnderecoFields('Carregando...', true);

        fetch(`https://viacep.com.br/ws/${cep}/json/`)
            .then(response => response.json())
            .then(data => {
                if (data.erro) {
                    alert('CEP não encontrado.');
                    clearEnderecoFields();
                } else {
                    setEnderecoFields({
                        logradouro: data.logradouro,
                        bairro: data.bairro,
                        cidade: data.localidade,
                        uf: data.uf
                    });
                }
            })
            .catch(error => {
                console.error('Erro ao buscar o CEP:', error);
                alert('Não foi possível buscar o CEP. Verifique a sua conexão.');
                clearEnderecoFields();
            });
    });

    function setEnderecoFields(values, isLoading = false) {
        const fields = ['logradouro', 'bairro', 'cidade', 'uf'];
        fields.forEach(field => {
            const el = document.getElementById(`${field}Estudante`);
            el.value = isLoading ? values : values[field];
            if (isLoading) {
                el.classList.add('italic');
            } else {
                el.classList.remove('italic');
            }
        });
    }

    function clearEnderecoFields() {
        setEnderecoFields({ logradouro: '', bairro: '', cidade: '', uf: '' });
    }
});
