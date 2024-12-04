<?php
    //incluir o arquivo de conexão 
    include "conexao.php";

    //requisição de dados do formulário
    $nome = $_POST["nome"];
    $telefone = $_POST["telefone"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    //montar um sql de insert 
    $sql = "insert into clientes(nome, telefone, email, senha) values('$nome', '$telefone', '$email', '$senha')";

    //executar o sql insert no BD
    $resultado = mysqli_query($conexao, $sql);

    //fechar a conexão
    mysqli_close($conexao);

    //redirecionar para a página iniciar
    header("location: index.html");
?>