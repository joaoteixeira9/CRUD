<?php include "header.php"; include "conexao.php" ?>
<main>
    <h2>clientes</h2>
    <table border="2">
        <tr>
            <th>id</th>
            <th>nome</th>
            <th>telefone</th>
            <th>email</th>
        </tr>
        <?php 
            $sql = "select * from clientes";
            $resultado = mysqli_query($conexao, $sql);
            echo "<br><br>";
        
            while ($linha = mysqli_fetch_assoc($resultado)) {
                echo "<tr>"; //começo coluna
                echo "<td> {$linha['id']} </td>"; // {} => interpolação de strings
                echo "<td> {$linha['nome']} </td>";
                echo "<td> {$linha['telefone']} </td>";
                echo "<td> {$linha['email']} </td>";
            }
        ?>
    </table>
</main>
<?php include "footer.php" ?>