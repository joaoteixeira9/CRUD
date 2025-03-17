<?php
    include "../includes/conexao.php";

    $nome = $_POST["nome"];
    $telefone = $_POST["telefone"];
    $endereco = $_POST["endereco"];
    $produto = $_POST["produto"];
    $acoes = $_POST["pix"];
    $email = $_POST["cnpj"];
    $descricao = $_POST["descricao"];

    $sql = "INSERT INTO  fornecedores ('nome', 'telefone', 'endereco', 'produto', 'pix', 'cnpj') VALUES
     ('$nome', '$telefone', '$endereco', '$produto', '$pix', '$cnpj '$descricao')";

    $resultado = mysqli_query($conexao, $sql);

    if ($resultado) {
        echo "Registro inserido com sucesso!";
    } else {
        echo "Erro ao inserir registro: " . mysqli_error($conexao);
    }

    mysqli_close($conexao);

    header("Location: ./fornecedores-listar.php");
?>
