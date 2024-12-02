<?php
    include "conexao.php";

    $nome = $_POST["nome"];
    $telefone = $_POST["telefone"];
    $email = $_POST["email"];
    $endereco = $_POST["endereco"];
    $produto = $_POST["produto"];
    $acoes = $_POST["acoes"];

    $sql = "INSERT INTO  fornecedores (`nome`, `telefone`, `email`, `endereco`, `produto`, `acoes`) VALUES
     ('$nome', '$telefone', '$email', '$endereco', '$produto', '$acoes')";

    $resultado = mysqli_query($conexao, $sql);

    if ($resultado) {
        echo "Registro inserido com sucesso!";
    } else {
        echo "Erro ao inserir registro: " . mysqli_error($conexao);
    }

    mysqli_close($conexao);

    header("Location: fornecedores-listar.php");
?>
