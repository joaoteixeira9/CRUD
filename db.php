<?php
$servername = "localhost";
$username = "root"; // seu usuário do MySQL
$password = "";     // sua senha do MySQL
$dbname = "barbearia";

// Criação da conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificação de conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>
