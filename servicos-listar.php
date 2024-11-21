<?php 
include "header.php"; 
include "conexao.php";
?>

<main>
    <h2>Todos os serviços</h2>
    <a href="servicos-cadastrar.php">Adicionar novo serviço</a>
    <table border="2">
        <tr>
            <th>SERVIÇO</th>
            <th>DESCRIÇÃO</th>
            <th>PREÇO</th>
            <th>CATEGORIA</th>
        </tr>
    <?php
    $sql = "select * from servicos";
    $resultado = mysqli_query($conexao, $sql);
    echo "<br><br>";

    while ($linha = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td>". $linha['servico'] ."</td>";
        echo "<td>". $linha['descricao'] ."</td>";
        echo "<td>". $linha['preco'] ."</td>";
        echo "<td>". $linha['categoria'] ."</td>";
        echo "</tr>";
    }

    mysqli_close($conexao);

    //para debugar
    // echo "<pre>";
    // print_r($resultado);
    // echo "</pre>";
    //fim debug
    ?>
    </table>
</main>

<?php include "footer.php"; ?>