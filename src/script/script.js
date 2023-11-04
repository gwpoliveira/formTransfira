
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

