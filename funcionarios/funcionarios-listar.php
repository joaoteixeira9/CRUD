<?php
include "../includes/header.php";
include "../includes/conexao.php";
?>

<main>
    <link rel="stylesheet" href="../css/funcionarios-listar.css">
    <h2 class="container-fluid mb-3">Todos os funcionários</h2>
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
                function formatarTelefone($telefone) {
                    return preg_replace('/(\d{2})(\d{5})(\d{4})/', '($1) $2-$3', $telefone);
                }

                while($linha = mysqli_fetch_assoc($resultado)){
                    $telefoneFormatado = formatarTelefone($linha['telefone']);
                    echo "<tbody>";
                    echo "<tr>";
                    echo "<td> {$linha['nome']} </td>";
                    echo "<td> {$telefoneFormatado} </td>";
                    echo "</tr>";
                    echo "</tbody>";
                }

                mysqli_close($conexao);

            ?>
        </table>
    </div>
</main>
<script src="../js/clientes-cadastro.js"></script>
<?php include "../includes/footer.php"; ?>