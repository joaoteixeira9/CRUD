<?php 
include "../includes/header.php";
include "../includes/conexao.php"; 
?>

<main>
    <link rel="stylesheet" href="clientes-listar">
    <br>
    <h2 class="container-fluid">Todos os Clientes</h2>

    <table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NOME</th>
            <th scope="col">TELEFONE</th>
            <th scope="col">EMAIL</th>
        </tr>
    </thead>

        <?php 
            $sql = "select * from clientes";
            $resultado = mysqli_query($conexao, $sql);
            echo "<br><br>";
        
            while ($linha = mysqli_fetch_assoc($resultado)) {
                echo "<tbody>";
                echo "<tr>"; //começo coluna
                echo "<td> {$linha['id']} </td>"; // {} => interpolação de strings
                echo "<td> {$linha['nome']} </td>";
                echo "<td> {$linha['telefone']} </td>";
                echo "<td> {$linha['email']} </td>";

                echo "</tr>";
                echo "</tbody>";
            }
        ?>
    </table>
</main>
<?php include "../includes/footer.php" ?>