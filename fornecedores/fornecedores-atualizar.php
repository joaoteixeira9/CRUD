<?php
    include "../includes/conexao.php";

    $id = $_GET["id"];
    $nome = $_POST["nome"];
    $telefone = $_POST["telefone"];
    $endereco = $_POST["endereco"];
    $produto = $_POST["produto"];
    $email = $_POST["pix"];
    $quantidade = $_POST["cnpj"];
    $descricao = $_POST["descricao"];
    
    $sql = "update fornecedores set nome = '$nome', telefone = '$telefone', endereco = '$endereco', 
    produto = '$produto', pix = '$pix', cnpj = ' $cnpj', descricao = '$descricao', =  where id = '$id'";
    $resultado = mysqli_query($conexao,$sql);

    mysqli_close($conexao);

    header("Location: ./fornecedores-listar.php");
?>