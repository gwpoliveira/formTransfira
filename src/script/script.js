
    // Mostrar/ocultar campos de Nome Social e Necessidade Especial com base nas seleções de checkbox
    document.getElementById('nome-social-checkbox').addEventListener('change', function () {
        var nomeSocialDiv = document.getElementById('nome-social-div');
        nomeSocialDiv.style.display = this.checked ? 'block' : 'none';
    });

    document.getElementById('necessidade-especial-checkbox').addEventListener('change', function () {
        var necessidadeEspecialDiv = document.getElementById('necessidade-especial-div');
        necessidadeEspecialDiv.style.display = this.checked ? 'block' : 'none';
    });

    // Função para mostrar a etapa atual e ocultar as outras
function showStep(step) {
    for (let i = 1; i <= 3; i++) {
        const stepElement = document.getElementById(`etapa${i}`);
        if (i === step) {
            stepElement.style.display = 'block';
        } else {
            stepElement.style.display = 'none';
        }
    }
}

// Função para avançar para a próxima etapa
function nextStep(currentStep) {
    if (currentStep < 3) {
        showStep(currentStep + 1);
    }
}

// Função para voltar para a etapa anterior
function prevStep(currentStep) {
    if (currentStep > 1) {
        showStep(currentStep - 1);
    }
}

// Iniciar com a primeira etapa visível
showStep(1);

// Função para validar os campos obrigatórios em uma etapa
function validateStep(step) {
    switch (step) {
        case 1:
            // Etapa 1: Verifique apenas o campo "privacidade"
            const privacidadeCheckbox = document.getElementById('privacidade');
            if (!privacidadeCheckbox.checked) {
                alert('Você deve concordar com a Política de Privacidade para continuar.');
                return false;
            }
            break;
        case 2:
            // Etapa 2: Verifique todos os campos obrigatórios
            const nome = document.getElementById('nome').value;
            const email = document.getElementById('email').value;
            const celular = document.getElementById('celular').value;

            if (nome === '' || email === '' || celular === '') {
                alert('Preencha todos os campos obrigatórios na Etapa 2.');
                return false;
            }
            break;
        case 3:
            // Etapa 3: Verifique todos os campos obrigatórios
            const cpf = document.getElementById('cpf').value;
            const historico = document.getElementById('historico').value;

            if (cpf === '' || historico === '') {
                alert('Preencha todos os campos obrigatórios na Etapa 3.');
                return false;
            }
            break;
    }
    return true;
}

// Função para avançar para a próxima etapa com validação
function nextStep(currentStep) {
    if (currentStep < 3) {
        if (validateStep(currentStep)) {
            showStep(currentStep + 1);
        }
    }
}

