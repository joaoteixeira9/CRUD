<?php
include "../includes/header.php";
include "../includes/conexao.php";
?>
<main>
    <link rel="stylesheet" href="../css/fornecedores-listar.css">
    <br>
    <h2 class="container-fluid">Todos os fornecedores</h2>
    <div class="table-responsive">
        <table class="table table-hover border">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NOME</th>
                <th scope="col">TELEFONE</th>
                <th scope="col">ENDERECO</th>
                <th scope="col">PRODUTO</th>
                <th scope="col">PIX</th>
                <th scope="col">CNPJ</th>
                <th scope="col">DESCRIÇÃO</th>
                <th scope="col">AÇÕES</th>
            </tr>
        </thead>
        
            <?php
                $sql = "SELECT * FROM `fornecedores`";
                if ($resultado = mysqli_query($conexao, $sql)) {
                    echo "<br><br>";
                } else {
                    echo "Erro ao executar a consulta: " . mysqli_error($conexao);
                }

                while($linha = mysqli_fetch_assoc($resultado)){  
                    echo "<tbody>";                
                    echo "<tr>";

                    echo "<td> {$linha['id']} </td>"; 
                    echo "<td> {$linha['nome']} </td>";
                    echo "<td> {$linha['telefone']} </td>";
                    echo "<td> {$linha['endereco']} </td>";
                    echo "<td> {$linha['produto']} </td>";
                    echo "<td> {$linha['pix']} </td>";
                    echo "<td> {$linha['cnpj']} </td>";
                    echo "<td> {$linha['descricao']} </td>";
                    echo "<td>";

                    echo "<a href ='../fornecedores/fornecedores-excluir.php?id={$linha['id']}'>";
                    echo "<img src='../img/lixeira.svg' width='25'>";
                    echo "</a>";
                    echo "<td>";

                    echo "<a href ='../fornecedores/fornecedores-editar.php?id={$linha['id']}'>";
                    echo "<img src='../img/editar.svg' width='25'>";
                    echo "</a>";
                    echo "</td>";
                    echo "</tbody>";
                    echo "</tr>";
                   
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