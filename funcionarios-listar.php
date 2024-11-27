<?php include "header.php"; include "conexao.php"?>
<main>
    <h2>Funcionários</h2>
    <a href="funcionarios-cadastrar.php">Cadastre um novo funcionário</a>
    <table border="2">
        <tr>
            <th>id</th>
            <th>nome</th>
            <th>telefone</th>
            <th>ações</th>
        </tr>
        <?php
            $sql = "SELECT * FROM funcionarios";
            $resultado = mysqli_query($conexao, $sql);
            echo "<br><br>";

            while ($l = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td>{$l['id']}</td>";
                echo "<td>{$l['nome']}</td>";
                echo "<td>{$l['telefone']}</td>";

                echo "<td>";    //INICIO AÇÕES
                
                // INICIO EXCLUIR FUNCIONÁRIOS
                echo "<a href='funcionarios-excluir.php?id={$l['id']}'>";   
                echo "<img src='img/lixeira.svg' alt=''>";
                echo "</a>";
                // FIM EXCLUIR FUNCIONÁRIOS
                
                // INICIO EDITAR FUNCIONÁRIOS
                echo "<a href='funcionarios-editar.php?id={$l['id']}'>";  
                echo "<img src='img/editar.svg' alt=''>";
                echo "</a>";
                // FIM EDITAR FUNCIONÁRIOS

                echo "</td>";   //FIM AÇÕES
                echo "</tr>";
            }
            mysqli_close($conexao);
        ?>
    </table>
</main>
<?php include "footer.php"?>