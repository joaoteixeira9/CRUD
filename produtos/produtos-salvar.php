<?php

// Requisitar os dados do formulário
$nome = $_POST["nome"];
$descricao = $_POST["descricao"];
$preco = $_POST["preco"];

// Verificar se há uma foto enviada
if (isset($_FILES["foto"]) && $_FILES["foto"]["error"] == 0) {
    // Definir o diretório onde a foto será salva
    $diretorio = "../img/";
    $nomeFoto = basename($_FILES["foto"]["name"]); // Nome do arquivo
    $caminhoFoto = $diretorio . $nomeFoto;

    // Mover o arquivo para o diretório de destino
    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $caminhoFoto)) {
    }
} else {
    $caminhoFoto = null; // Caso não haja foto, não armazena nada
}

// Montar o SQL de insert
$sql = "INSERT INTO produtos (nome, descricao, preco)
        VALUES ('$nome', '$descricao', '$preco')";

// Incluir o arquivo de conexão
include "../includes/conexao.php";

// Executar o SQL insert no BD
$resultado = mysqli_query($conexao, $sql);

// Fechar a conexão
mysqli_close($conexao);

// Redirecionar para a página listar
header("Location: ./produtos-listar.php");
?>
