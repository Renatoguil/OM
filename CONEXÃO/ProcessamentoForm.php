<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST["nome"];
  $email = $_POST["email"];
  $nivel = $_POST["nivel"];
  $mensagem = $_POST["mensagem"];

  include("ConexaoForm.php"); // Inclui o arquivo de configuração da conexão com o banco de dados

  // Prepara a instrução SQL para inserir dados na tabela
  $sql = "INSERT INTO interesse_budismo (nome, email, nivel, mensagem) VALUES (?, ?, ?, ?)";

  // Prepara a declaração
  if ($stmt = $conn->prepare($sql)) {
    // Vincula os parâmetros
    $stmt->bind_param("ssss", $nome, $email, $nivel, $mensagem);

    // Executa a instrução SQL
    if ($stmt->execute()) {
      // Envia o e-mail (código de envio de e-mail aqui)

      echo "Obrigado por entrar em contato! Seu interesse em estudos budistas foi registrado.";
    } else {
      echo "Desculpe, houve um problema ao processar seu interesse. Por favor, tente novamente mais tarde.";
    }

    // Fecha a declaração
    $stmt->close();
  } else {
    echo "Desculpe, houve um problema ao processar seu interesse. Por favor, tente novamente mais tarde.";
  }

  // Fecha a conexão com o banco de dados
  $conn->close();
}
