<?php
    $id = $_GET['id'];
    $servico = $_POST['servico'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $categoria = $_POST['categoria'];

    // montar um sql de update
    $sql = "update servicos set servico = '$servico', descricao = '$descricao', preco = '$preco', categoria = '$categoria' where id = $id";
    // incluir o arquivo de conexão
    include "../includes/conexao.php";

    // executar o sql update 
    $resultado = mysqli_query($conexao,$sql);

    mysqli_close($conexao);

    header("Location: ./servicos-listar.php");
?>