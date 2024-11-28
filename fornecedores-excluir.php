<?php
    include "conexao.php";

    $id = $_GET["id"];

    $sql = "DELETE FROM fornecedores WHERE id = '$id'";
    $resultado = mysqli_query($conexao,$sql);

    mysqli_close($conexao);

    header("Location: fornecedores-listar.php");
?>