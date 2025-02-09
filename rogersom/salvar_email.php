<?php
$servername = "localhost";
$username = "root"; // Usuário padrão do XAMPP
$password = ""; // Senha padrão do XAMPP (vazia)
$dbname = "newsletter_db";

// Conectar ao banco
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['email_news'], FILTER_SANITIZE_EMAIL);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $sql = "INSERT INTO emails (email) VALUES ('$email')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('E-mail cadastrado com sucesso!'); window.location.href='contato.html';</script>";
        } else {
            echo "<script>alert('Erro ao cadastrar. Tente outro e-mail.'); window.location.href='contato.html';</script>";
        }
    } else {
        echo "<script>alert('E-mail inválido!'); window.location.href='contato.html';</script>";
    }
}

$conn->close();
?>
