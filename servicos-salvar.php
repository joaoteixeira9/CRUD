<?php
    //incluir o arquivo de conexão 
    include "conexao.php";

    //requisição de dados do formulário
    $servico = $_POST["servico"];
    $descricao = $_POST["descricao"];
    $preco = $_POST["preco"];
    $categoria = $_POST["categoria"];

    //montar um sql de insert 
    $sql = "insert into servicos(servico, descricao, preco, categoria) values('$servico', '$descricao', '$preco', '$categoria')";

    //executar o sql insert no BD
    $resultado = mysqli_query($conexao, $sql);

    //fechar a conexão
    mysqli_close($conexao);

    //redirecionar para a página iniciar
    header("location: servicos-listar.php");
?>