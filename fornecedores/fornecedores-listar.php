<?php
include "../includes/header.php";
include "../includes/conexao.php";
?>

<main>
    <link rel="stylesheet" href="../css/fornecedores-listar.css">
    <br>
    <h2 class="container-fluid">Todos os fornecedores</h2>
    <a class="container-fluid" href="./fornecedores-cadastrar.php">Adicionar novo fornecedor</a>

    <table class="table table-hover border">
    <thead>
        <tr>
            <th scope="col">NOME</th>
            <th scope="col">TELEFONE</th>
            <th scope="col">EMAIL</th>
            <th scope="col">ENDERECO</th>
            <th scope="col">PRODUTO</th>
            <th scope="col">QUANTIDADE</th>
            <th scope="col">DESCRIÇÃO</th>

        </tr>
    </thead>
<?php

$sql = "SELECT * FROM `fornecedores`";
if ($resultado = mysqli_query($conexao, $sql)) {
    echo "<br><br>";
} else {
    echo "Erro ao executar a consulta: " . mysqli_error($conexao);
}

while($linha = mysqli_fetch_assoc($resultado)){
    echo "<tbody>";
    echo "<tr>";
    echo "<td> {$linha['nome']} </td>";
    echo "<td> {$linha['telefone']} </td>";
    echo "<td> {$linha['email']} </td>";
    echo "<td> {$linha['endereco']} </td>";
    echo "<td> {$linha['produto']} </td>";
    echo "<td> {$linha['quantidade']} </td>";
    echo "<td> {$linha['descricao']} </td>";

    // echo "<td>";
    // echo "<a href ='fornecedores-excluir.php?id={$linha['id']}'>";
    // echo "<img src='excluir.png' width='25'>";
    // echo "</a>";

    // echo "<td>";
    // echo "<a href ='fornecedores-editar.php?id={$linha['id']}'>";
    // echo "<img src='editar.png' width='25'>";
    // echo "</a>";

    echo "</td>";
    echo "</tr>";
    echo "</tbody>";
}

mysqli_close($conexao);

/*para debugar
echo "<pre>";
print_r($resultado);
echo "</pre>";
fim debugar
*/

?>
</table>
</main>
<?php include "../includes/footer.php"; ?>