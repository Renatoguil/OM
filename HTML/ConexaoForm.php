<?php
// Informações de conexão com o banco de dados
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'OM';

// Conectando ao banco de dados
$conn = new mysqli($host, $username, $password, $database);

// Verificando a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Capturando dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$nivel = $_POST['nivel'];
$mensagem = $_POST['mensagem'];

// Inserindo os dados no banco de dados
$sql = "INSERT INTO interesse_budismo (nome, email, nivel, mensagem) VALUES ('$nome', '$email', '$nivel', '$mensagem')";

if ($conn->query($sql) === TRUE) {
    echo "Registro inserido com sucesso!";
} else {
    echo "Erro ao inserir registro: " . $conn->error;
}

// Fechando a conexão com o banco de dados
$conn->close();
