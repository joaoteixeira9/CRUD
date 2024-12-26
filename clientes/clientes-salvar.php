<?php
    //incluir o arquivo de conexão 
    include "../includes/conexao.php";

    //requisição de dados do formulário
    $nome = $_POST["nome"];
    $telefone = $_POST["telefone"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Verificar se o email já existe no banco de dados
    $sql_verificar_email = "SELECT * FROM clientes WHERE email = '$email'";
    $resultado_email = mysqli_query($conexao, $sql_verificar_email);

    if (mysqli_num_rows($resultado_email) > 0) {
        echo "<script>alert('Já existe um cadastro com esse email. Por favor, tente outro email.'); window.history.back();</script>";
    } else {
        $sql = "INSERT INTO clientes (nome, telefone, email, senha) VALUES ('$nome', '$telefone', '$email', '$senha')";
        $resultado = mysqli_query($conexao, $sql);

        if ($resultado) {
            echo "<script>alert('Cadastro realizado com sucesso!'); window.location.href='../index.html';</script>";
        } else {
            echo "<script>alert('Erro ao cadastrar. Tente novamente mais tarde.'); window.history.back();</script>";
        }
    }
    mysqli_close($conexao);
?>