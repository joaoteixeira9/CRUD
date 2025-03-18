<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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

    $sql = "insert into nome(nome, telefone, endereco, produto, pix, cnpj, descricao) values('$nome', '$telefone', '$endereco', '$produto', '$pix', '$cnpj', '$descricao')";
    
    $resultado = mysqli_query($conexao, $sql);

    mysqli_close($conexao);
    header("location: ./servicos-listar.php");
?>