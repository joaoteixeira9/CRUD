<?php
    include "conexao.php";

    $id = $_GET["id"];
    $nome = $_POST["nome"];
    $telefone = $_POST["telefone"];
    $email = $_POST["email"];
    $endereco = $_POST["endereco"];
    $produto = $_POST["produto"];
    $acoes = $_POST["acoes"];

    $sql = "update fornecedores set nome = '$nome', telefone = '$telefone', email = '$email', endereco = '$endereco', produto = '$produto', acoes = '$acoes' where id = '$id'";
    $resultado = mysqli_query($conexao,$sql);

    mysqli_close($conexao);

    header("Location: fornecedores-listar.php");
?>