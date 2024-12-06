<?php 
include "header.php";
include "conexao.php";
?>
<main>

<h2>Todos os Produtos</h2>
<a href="produtos-cadastro.php">Adicionar novo produto</a>

<table border="2">
    <tr>
        <th>NOME</th>
        <th>CATEGORIA</th>
        <th>DESCRIÇÃO</th>
        <th>VALIDADE</th>
        <th>PREÇO</th>
        <th>DELETAR</th>
        <th>EDITAR</th>
    </tr>

<?php

$sql = "select * from produtos";
$resultado = mysqli_query($conexao, $sql);

while($linha = mysqli_fetch_assoc($resultado)){
    echo "<tr>";
    echo "<td> {$linha['nome']} </td>";
    echo "<td> {$linha['categoria']} </td>";
    echo "<td> {$linha['descricao']} </td>";
    echo "<td> {$linha['validade']} </td>";
    echo "<td> {$linha['preco']} </td>";

    echo "<td>";
    echo "<a href ='produtos-excluir.php?id={$linha['id']}'>";
    echo "<img src='excluir.png' width='25'>";
    echo "</a>";

    echo "<td>";
    echo "<a href ='produtos-editar.php?id={$linha['id']}'>";
    echo "<img src='editar.png' width='25'>";
    echo "</a>";

    echo "</td>";
    echo "</tr>";
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
<?php include "footer.php"; ?>