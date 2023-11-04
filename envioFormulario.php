<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Defina as informações de destino do email
    $destinatario = "gwpoliveira@gmail.com";
    $copia = "gwpoliveira@gmail.com";
    $assunto = "Formulário de Inscrição";

    // Coleta os dados do formulário
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $celular = $_POST["celular"];
    $privacidade = $_POST["privacidade"];
    $formaDeIngresso = $_POST["forma_de_ingresso"];
    $cpf = $_POST["cpf"];
    $dataDeNascimento = $_POST["data_de_nascimento"];
    $possuiNomeSocial = isset($_POST["possui_nome_social"]) ? "Sim" : "Não";
    $nomeSocial = $_POST["nome_social"];
    $possuiNecessidadeEspecial = isset($_POST["necessidade_especial"]) ? "Sim" : "Não";
    $descricaoNecessidadeEspecial = $_POST["descricao_necessidade_especial"];

    // Construa o corpo do email
    $mensagem = "Nome: $nome\n";
    $mensagem .= "Email: $email\n";
    $mensagem .= "Celular: $celular\n";
    $mensagem .= "Privacidade: $privacidade\n";
    $mensagem .= "Forma de Ingresso: $formaDeIngresso\n";
    $mensagem .= "CPF: $cpf\n";
    $mensagem .= "Data de Nascimento: $dataDeNascimento\n";
    $mensagem .= "Possui Nome Social: $possuiNomeSocial\n";
    if ($possuiNomeSocial == "Sim") {
        $mensagem .= "Nome Social: $nomeSocial\n";
    }
    $mensagem .= "Possui Necessidade Especial: $possuiNecessidadeEspecial\n";
    if ($possuiNecessidadeEspecial == "Sim") {
        $mensagem .= "Descrição da Necessidade Especial: $descricaoNecessidadeEspecial\n";
    }

    // Configurar cabeçalhos para o email
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Cc: $copia\r\n";

    // Enviar o email
    if (mail($destinatario, $assunto, $mensagem, $headers)) {
        echo "O formulário foi enviado com sucesso!";
    } else {
        echo "Ocorreu um erro ao enviar o formulário. Por favor, tente novamente mais tarde.";
    }
    } else {
        echo "Acesso direto a este script não é permitido.";
    }

    ?>
