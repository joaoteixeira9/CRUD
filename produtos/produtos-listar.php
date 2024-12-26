<?php 
include "../includes/header.php";
include "../includes/conexao.php";
?>

<main>
    <link rel="stylesheet" href="produtos-listar">
    <br>
    <h2 class="container-fluid">Todos os Produtos</h2>
    <a class="container-fluid" href="./produtos-cadastrar.php">Adicionar novo Produto</a>
    <a class="container-fluid" href="../html/produtos.html">Ver Produtos</a>

    <table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">NOME</th>
            <th scope="col">CATEGORIA</th>
            <th scope="col">DESCRIÇÃO</th>
            <th scope="col">VALIDADE</th>
            <th scope="col">PREÇO</th>
        </tr>
    </thead>
<?php

$sql = "select * from produtos";
$resultado = mysqli_query($conexao, $sql);
echo "<br><br>";

while($linha = mysqli_fetch_assoc($resultado)){
    echo "<tbody>";
    echo "<tr>";
    echo "<td> {$linha['nome']} </td>";
    echo "<td> {$linha['categoria']} </td>";
    echo "<td> {$linha['descricao']} </td>";
    echo "<td> {$linha['validade']} </td>";
    echo "<td> {$linha['preco']} </td>";

    // echo "<td>";
    // echo "<a href ='produtos-excluir.php?id={$linha['id']}'>";
    // echo "<img src='excluir.png' width='25'>";
    // echo "</a>";

    // echo "<td>";
    // echo "<a href ='produtos-editar.php?id={$linha['id']}'>";
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