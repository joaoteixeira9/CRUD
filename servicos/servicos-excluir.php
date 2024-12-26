<?php
    //requisitar os dados
    $id = $_GET["id"];

    //montar sql de delete
    $sql = "delete from servicos where id = $id";

    //incluir o arquivo de conexão
    include "../includes/conexao.php";

    //executar o sql delete no BD
    $resultado = mysqli_query($conexao, $sql);

    //fechar a conexão
    mysqli_close($conexao);

    //redirecionar para a página listar
    header("Location: ./servicos-listar.php");
?>