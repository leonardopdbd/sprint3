<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "newsletter_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

$sql = "SELECT * FROM emails ORDER BY data_cadastro DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Lista de E-mails</title>
</head>
<body>
    <h2>Lista de E-mails Cadastrados</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>E-mail</th>
            <th>Data de Cadastro</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["id"] . "</td><td>" . $row["email"] . "</td><td>" . $row["data_cadastro"] . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Nenhum e-mail cadastrado.</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
