<?php
include "header.php";
include "conexao.php";
?>
<main>
    <h2>Todos os Fornecedores</h2>
    <a href="fornecedores-cadastrar.php">Adicionar novo fornrcedor</a>
    <table border="2">
        <tr>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Email</th>
            <th>Endereço</th>
            <th>Produto</th>
            <th>Ações</th>
        </tr>
        <?php
        $sql = "SELECT * FROM fornecedores";
        $resultado = mysqli_query($conexao, $sql);

        while ($linha = mysqli_fetch_assoc($resultado)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($linha['nome']) . "</td>";
            echo "<td>" . htmlspecialchars($linha['telefone']) . "</td>";
            echo "<td>" . htmlspecialchars($linha['email']) . "</td>";
            echo "<td>" . htmlspecialchars($linha['endereco']) . "</td>";
            echo "<td>" . htmlspecialchars($linha['produto']) . "</td>";
            echo "<td>" . htmlspecialchars($linha['acoes']) . "</td>";
            echo "<td>";
            echo "<a href='fornecedores-excluir.php?id={$linha['id']}'>";
            echo "<img src='img/lixeira.svg' width='20px' alt='Excluir'>";
            echo "</a>";
            echo "<a href='fornecedores-editar.php?id={$linha['id']}'>";
            echo "<img src='img/editar.svg' width='20px' alt='Editar'>";
            echo "</a>";
            echo "</td>";
            echo "</tr>";
        }

        mysqli_close($conexao);
        ?>
    </table>
</main>
<?php include "footer.php"; ?>