<?php include "./usuario-header.php"; include "../../includes/conexao.php"?>
<link rel="stylesheet" href="../../css/usuario-funcionarios-listar.css">
<main class="container my-5">
    <h2 class="text-center mb-4" style="color: #2c3e50;">Funcionários</h2>
    <table class="table table-hover table-bordered rounded shadow-sm elegant-table">
        <thead class="table-dark">
            <tr>
                <th>Nome</th>
                <th>Telefone</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT * FROM funcionarios";
                $resultado = mysqli_query($conexao, $sql);

                while ($l = mysqli_fetch_assoc($resultado)) {
                    // Formatando o telefone para o modelo (19) 99999-9999
                    $telefone = $l['telefone'];
                    $telefone_formatado = "(" . substr($telefone, 0, 2) . ") " . substr($telefone, 2, 5) . "-" . substr($telefone, 7);

                    // Exibindo o nome e o telefone
                    echo "<tr>";
                    echo "<td>" . $l['nome'] . "</td>";
                    echo "<td>" . $telefone_formatado . "</td>";
                    echo "</tr>";
                }
                mysqli_close($conexao);
            ?>
        </tbody>
    </table>
</main>

<?php include "./footer.php"?>
