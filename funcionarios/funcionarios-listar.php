<?php
include "../includes/header.php";
include "../includes/conexao.php";
?>

<main>
    <link rel="stylesheet" href="../css/funcionarios.-listar.css">
    <br>
    <h2 class="container-fluid">Todos os funcionários</h2>
    <a class="container-fluid" href="funcionarios-cadastrar.php">Adicionar novo Funcionário</a>
    <div class="servicos">
    <table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">NOME</th>
            <th scope="col">TELEFONE</th>
            <th scope="col">AÇÕES</th>
        </tr>
    </thead>
<?php

$sql = "select * from funcionarios";
$resultado = mysqli_query($conexao, $sql);
echo "<br><br>";

while($linha = mysqli_fetch_assoc($resultado)){
    echo "<tbody>";
    echo "<tr>";
    echo "<td> {$linha['nome']} </td>";
    echo "<td> {$linha['telefone']} </td>";
    echo "<td>"; //começo ações
        // excluir linhas de serviços
        echo "<a href='./funcionarios-excluir.php?id={$linha['id']}'>";
        echo "<img src='../img/lixeira.svg' alt=''>";
        echo "</a>";
        // fim excluir linhas de serviços
        
        //editar linhas de serviços
        echo "<a href='./funcionarios-editar.php?id={$linha['id']}'>";
        echo "<img src='../img/editar.svg' alt=''>";
        echo "</a>";
        //fim //editar linhas de serviços

        echo "</td>"; // fim ações
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
</div>
</main>
<?php include "../includes/footer.php"; ?>