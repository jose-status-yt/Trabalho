<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coleta os dados do formulário
    $nome = htmlspecialchars($_POST["nome"]);
    $email = htmlspecialchars($_POST["email"]);
    $mensagem = htmlspecialchars($_POST["mensagem"]);

    // Verifica o formato do e-mail
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // E-mail inválido
        echo "O e-mail fornecido não é válido.";
        // Você pode redirecionar o usuário de volta ao formulário, exibir uma mensagem de erro, etc.
        exit();
    }

    // Envia um email (um exemplo básico, você precisará configurar isso no seu servidor)
    $to = "seu@email.com";
    $assunto = "Nova mensagem do formulário de contato";
    $mensagem_email = "Nome: $nome\nEmail: $email\nMensagem: $mensagem";

    mail($to, $assunto, $mensagem_email);

    // Redireciona o usuário para a página de agradecimento
    header("obrigado.html");
    exit();
}
?>
