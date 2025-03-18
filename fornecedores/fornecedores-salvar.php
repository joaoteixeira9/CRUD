<?php
    //incluir o arquivo de conexão 
    include "../includes/conexao.php";

    //requisição de dados do formulário
    $nome = $_POST["nome"];
    $telefone = $_POST["telefone"];
    $endereco = $_POST["endereco"];
    $produto = $_POST["produto"];
    $pix = $_POST["pix"];
    $cnpj = $_POST["cnpj"];
    $descricao = $_POST["descricao"];

    $sql = "insert into fornecedores(nome, telefone, endereco, produto, pix, cnpj, descricao) values('$nome', '$telefone', '$endereco', '$produto', '$pix', '$cnpj', '$descricao')";
    
    $resultado = mysqli_query($conexao, $sql);

    mysqli_close($conexao);
    header("location: ./fornecedores-listar.php");
?>