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
            <th>AÇÕES</th>
        </tr>
    <?php
    $sql = "select * from servicos";
    $resultado = mysqli_query($conexao, $sql);
    echo "<br><br>";

    while ($linha = mysqli_fetch_assoc($resultado)) {
        echo "<tr>"; //começo coluna
        echo "<td> {$linha['servico']} </td>"; // {} => interpolação de strings
        echo "<td> {$linha['descricao']} </td>";
        echo "<td> {$linha['preco']} </td>";
        echo "<td> {$linha['categoria']} </td>";

        echo "<td>"; //começo ações
        // excluir linhas de serviços
        echo "<a href='servicos-excluir.php?id={$linha['id']}'>";
        echo "<img src='img/lixeira.svg' alt=''>";
        echo "</a>";
        // fim excluir linhas de serviços
        
        //editar linhas de serviços
        echo "<a href='servicos-editar.php?id={$linha['id']}'>";
        echo "<img src='img/editar.svg' alt=''>";
        echo "</a>";
        //fim //editar linhas de serviços

        echo "</td>"; // fim ações
        echo "</tr>"; // fim coluna
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