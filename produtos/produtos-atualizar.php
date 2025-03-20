<?php
// Requisitar os dados do formulário
$id = $_GET['id'];
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$preco = $_POST['preco'];

// Remove todos os espaços extras e o "R$"
$preco = trim($preco); // Remove espaços no início e no fim
$precoFormatado = str_replace("R$", "", $preco); // Remove "R$"
$precoFormatado = str_replace(" ", "", $precoFormatado); // Remove espaços extras
$precoFormatado = str_replace(",", ".", $precoFormatado); // Substitui vírgula por ponto

// Converte para float (opcional, dependendo do uso)
$precoFloat = floatval($precoFormatado);

// Montar um SQL de UPDATE
$sql = "UPDATE produtos 
        SET nome = '$nome', 
            descricao = '$descricao', 
            preco = '$precoFormatado' 
        WHERE id = $id";

// Incluir o arquivo de conexão
include "../includes/conexao.php";

// Executar o SQL UPDATE no BD
$resultado = mysqli_query($conexao, $sql);

// Fechar a conexão
mysqli_close($conexao);

// Redirecionar para a página listar
header("Location: ./produtos-listar.php");
?>