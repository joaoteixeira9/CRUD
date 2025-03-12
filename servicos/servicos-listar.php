<?php 
include "../includes/header.php"; 
include "../includes/conexao.php";
?>

<main class="mt-3">
    <link rel="stylesheet" href="../css/servicos-listar.css">
    <br>
    <h2 class="container-fluid">Todos os serviços</h2>
    <a class="container-fluid" href="../servicos/servicos-cadastrar.php">Adicionar novo serviço</a>
    
    <table class="table table-hover border">
        <thead>
            <tr>
                <th scope="col">SERVIÇO</th>
                <th scope="col">DESCRIÇÃO</th>
                <th scope="col">PREÇO</th>
                <th scope="col">CATEGORIA</th>
                <th scope="col">AÇÕES</th>
            </tr>
        </thead>
        <?php
        $sql = "select * from servicos";
        $resultado = mysqli_query($conexao, $sql);
        echo "<br><br>";

        while ($linha = mysqli_fetch_assoc($resultado)) {
            echo "<tbody>";
            echo "<tr>"; //começo coluna
            echo "<td> {$linha['servico']} </td>"; // {} => interpolação de strings
            echo "<td> {$linha['descricao']} </td>";
            echo "<td> R$ {$linha['preco']} </td>";
            echo "<td> {$linha['categoria']} </td>";

            echo "<td>"; //começo ações
            // excluir linhas de serviços
            echo "<a href='../servicos/servicos-excluir.php?id={$linha['id']}'>";
            echo "<img src='../img/lixeira.svg' alt=''>";
            echo "</a>";
            // fim excluir linhas de serviços

            //editar linhas de serviços
            echo "<a href='../servicos/servicos-editar.php?id={$linha['id']}'>";
            echo "<img src='../img/editar.svg' alt=''>";
            echo "</a>";
            //fim editar linhas de serviços

            echo "</td>"; // fim ações
            echo "</tr>"; // fim coluna
            echo "</tbody>";
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

<?php include "../includes/footer.php"; ?>
