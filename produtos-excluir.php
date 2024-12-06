<?php

// requisitar os dados,
$id = $_GET['id'];

// montar um sql de delete
$sql = "delete from produtos where id = $id";

// incluir o arquivo de conexão
include "conexao.php";

// executar o sql delete no BD
$resultado = mysqli_query($conexao, $sql);

// fechar a conexão 
mysqli_close($conexao);

// redirecionar para a página listar
header("Location: produtos-listar.php");

?>