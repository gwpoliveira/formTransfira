
    // Mostrar/ocultar campos de Nome Social e Necessidade Especial com base nas seleções de checkbox
    document.getElementById('nome-social-checkbox').addEventListener('change', function () {
        var nomeSocialDiv = document.getElementById('nome-social-div');
        nomeSocialDiv.style.display = this.checked ? 'block' : 'none';
    });

    document.getElementById('necessidade-especial-checkbox').addEventListener('change', function () {
        var necessidadeEspecialDiv = document.getElementById('necessidade-especial-div');
        necessidadeEspecialDiv.style.display = this.checked ? 'block' : 'none';
    });
