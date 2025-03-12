<?php 
include "../includes/header.php";
include "../includes/conexao.php"; 
?>
<main>
    <link rel="stylesheet" href="clientes-listar">
    <br>
    <h2 class="container-fluid">Todos os clientes</h2>

    <table class="table table-hover border">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NOME</th>
            <th scope="col">TELEFONE</th>
            <th scope="col">EMAIL</th>
            <th scope="col">TIPO DE USUÁRIO</th>
            <th scope="col">AÇÕES</th>
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
                echo "<td> {$linha['tipoDeUsuario']} </td>";
                echo "<td>";
                echo "<a href='./clientes-adm.php?id={$linha['id']}'>";
                echo "<p>Admin</p>";
                echo "</a>";
                echo "<a href='./clientes-usuario.php?id={$linha['id']}'>";
                echo "<p>Usuário</p>";
                echo "</a>";
                echo "</td>";
                echo "</tr>";
                echo "</tbody>";
            }
        ?>
    </table>
</main>
<?php include "../includes/footer.php" ?>