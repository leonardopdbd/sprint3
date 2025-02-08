<?php
// Habilitar exibição de erros para depuração (opcional)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Conexão com o banco de dados
$host = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'contato'; // Certifique-se de criar este banco de dados no phpMyAdmin

$conn = new mysqli($host, $usuario, $senha, $banco);

// Verificar a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Verificar se os dados foram enviados via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capturar os dados do formulário
    $nome = $conn->real_escape_string($_POST['nome']);
    $email = $conn->real_escape_string($_POST['email']);
    $mensagem = $conn->real_escape_string($_POST['mensagem']);

    // Inserir os dados na tabela
    $sql = "INSERT INTO mensagens (nome, email, mensagem) VALUES ('$nome', '$email', '$mensagem')";

    if ($conn->query($sql) === TRUE) {
        echo "Mensagem enviada com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Método de requisição inválido.";
}

// Fechar a conexão
$conn->close();
?>
