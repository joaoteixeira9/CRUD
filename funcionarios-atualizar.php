<?php
    include "conexao.php";

    $id = $_GET["id"];
    $nome = $_POST["nome"];
    $telefone = $_POST["telefone"];

    $sql = "UPDATE funcionarios set nome = '$nome', telefone = '$telefone' where id = '$id'";
    $resultado = mysqli_query($conexao,$sql);

    mysqli_close($conexao);

    header("Location: funcionarios-listar.php");
?>