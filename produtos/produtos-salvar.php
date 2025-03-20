<?php
$nome = $_POST["nome"];
$descricao = $_POST["descricao"];
$preco = $_POST["preco"];

// Remove todos os espaços extras e o "R$"
$preco = trim($preco); // Remove espaços no início e no fim
$precoFormatado = str_replace("R$", "", $preco); // Remove "R$"
$precoFormatado = str_replace(" ", "", $precoFormatado); // Remove espaços extras
$precoFormatado = str_replace(",", ".", $precoFormatado); // Substitui vírgula por ponto

// Converte para float (opcional, dependendo do uso)
$precoFloat = floatval($precoFormatado);

if (isset($_FILES["foto"]) && $_FILES["foto"]["error"] == 0) {
    $diretorio = "../img/";
    $extensao = pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);
    $nomeFoto = str_replace(" ", "-", $nome) . "." . $extensao;
    $caminhoFoto = $diretorio . $nomeFoto;

    if (!move_uploaded_file($_FILES["foto"]["tmp_name"], $caminhoFoto)) {
        $caminhoFoto = null;
    }
} else {
    $caminhoFoto = null;
}

// Insere o preço formatado no banco de dados
$sql = "INSERT INTO produtos (nome, descricao, preco, foto)
        VALUES ('$nome', '$descricao', '$precoFormatado', '$caminhoFoto')";

include "../includes/conexao.php";

$resultado = mysqli_query($conexao, $sql);

mysqli_close($conexao);

header("Location: ./produtos-listar.php");
?>