<?php
    include "../includes/conexao.php";

    $nome = $_POST["nome"];
    $telefone = $_POST["telefone"];
    $email = $_POST["email"];
    $endereco = $_POST["endereco"];
    $produto = $_POST["produto"];
    $acoes = $_POST["quantidade"];
    $descricao = $_POST["descricao"];

    $sql = "INSERT INTO  fornecedores ('nome', 'telefone', 'email', 'endereco', 'produto', 'quantidade', 'descricao') VALUES
     ('$nome', '$telefone', '$email', '$endereco', '$produto', '$quantidade', '$descricao')";

    $resultado = mysqli_query($conexao, $sql);

    if ($resultado) {
        echo "Registro inserido com sucesso!";
    } else {
        echo "Erro ao inserir registro: " . mysqli_error($conexao);
    }

    mysqli_close($conexao);

    header("Location: ./fornecedores-listar.php");
?>
