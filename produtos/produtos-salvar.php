<?php

// requisitar os dados do formulário
$nome = $_POST["nome"];
$categoria = $_POST["categoria"];
$descricao = $_POST["descricao"];
$validade = $_POST["validade"];
$preco = $_POST["preco"];

// montar um sql de insert
$sql = "insert into produtos(nome, categoria, descricao, validade, preco)
values('$nome', '$categoria', '$descricao', '$validade', '$preco')";

// incluir o arquivo de conexão
include "../includes/conexao.php";

// executar o sql insert no BD
$resultado = mysqli_query($conexao, $sql);

// fechar a conexão
mysqli_close($conexao);

// redirecionar para a página listar
header("Location: ./produtos-listar.php");

?>