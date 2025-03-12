<?php
include "../includes/header.php";
include "../includes/conexao.php";
?>

<main>
    <link rel="stylesheet" href="../css/funcionarios.-listar.css">
    <br>
    <h2 class="container-fluid">Todos os funcionários</h2>
    <div class="servicos">
    <table class="table table-hover border">
    <thead>
        <tr>
            <th scope="col">NOME</th>
            <th scope="col">TELEFONE</th>
        </tr>
    </thead>
<?php

$sql = "select * from clientes where tipoDeUsuario = 'admin'";
$resultado = mysqli_query($conexao, $sql);
echo "<br><br>";

while($linha = mysqli_fetch_assoc($resultado)){
    echo "<tbody>";
    echo "<tr>";
    echo "<td> {$linha['nome']} </td>";
    echo "<td> {$linha['telefone']} </td>";
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