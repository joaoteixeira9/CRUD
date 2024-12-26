<?php
// requisitar os dados do formulário
$id = $_GET['id'];
$nome = $_POST['nome'];
$categoria = $_POST['categoria'];
$descricao = $_POST['descricao'];
$validade = $_POST['validade'];
$preco = $_POST['preco'];

// montar um sql de update
$sql = "update produtos set nome = '$nome', categoria = '$categoria', descricao = '$descricao', validade = '$validade', preco = '$preco' where id = $id ";

// incluir o arquivo de conexão
include "../includes/conexao.php";

// executar o sql update no BD
$resultado = mysqli_query($conexao, $sql);

// fechar a conexão
mysqli_close($conexao);

// redirecionar para a página listar
header("Location: ./produtos-listar.php");
?>