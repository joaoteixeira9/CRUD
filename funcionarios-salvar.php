<?php
    include "conexao.php";

    $nome = $_POST["nome"];
    $telefone = $_POST["telefone"];

    $sql = "INSERT INTO `funcionarios` (`nome`, `telefone`) VALUES ( '$nome', '$telefone')";

    $resultado = mysqli_query($conexao, $sql);

    mysqli_close($conexao);

    header("Location: funcionarios-listar.php");
?>