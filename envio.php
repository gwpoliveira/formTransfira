<?php

// require("/home2/magis107/public_html/PHPMailer-master/src/PHPMailer.php");
// require("/home2/magis107/public_html/PHPMailer-master/src/SMTP.php");


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require ('vendor/autoload.php');



$mail = new PHPMailer(true);

$mail->IsSMTP();
$mail->SMTPDebug = SMTP::DEBUG_SERVER; // Desative o modo de depuração (pode ser ajustado conforme necessário)
$mail->SMTPAuth = true;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Use 'ssl' ou 'tls' de acordo com as configurações da HostGator
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // 465 ou 587, dependendo das configurações da HostGator
// $mail->IsHTML(true);
$mail->Username = "faespivestibular@gmail.com"; // Substitua pelo seu endereço de email de origem
$mail->Password = "samuca10x"; // Substitua pela sua senha de email de origem
// $mail->SetFrom("faespivestibular@gmail.com"); // Substitua pelo seu endereço de email de origem
// $mail->Subject = "Transfira-ser Faculdade Fatepi Faespi"; // Substitua pelo seu assunto

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

$mail->Body = $mensagem;

$mail->AddAddress("faespivestibular@gmail.com"); // Substitua pelo endereço de destino

// Enviar o email
if ($mail->Send()) {
    echo "O formulário foi enviado com sucesso!";
} else {
    echo "Ocorreu um erro ao enviar o formulário. Por favor, tente novamente mais tarde.";
}
