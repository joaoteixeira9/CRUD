<?php include "usuario-header.php"; include "conexao.php"?>
<main>
    <h2>Funcionários</h2>
    <table border="2">
        <tr>
            <th>nome</th>
            <th>telefone</th>
        </tr>
        <?php
            $sql = "SELECT * FROM funcionarios";
            $resultado = mysqli_query($conexao, $sql);
            echo "<br><br>";

            while ($l = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td>{$l['nome']}</td>";
                echo "<td>{$l['telefone']}</td>";
                echo "</tr>";
            }
            mysqli_close($conexao);
        ?>
    </table>
</main>
<?php include "footer.php"?>