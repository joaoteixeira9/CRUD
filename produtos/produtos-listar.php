<?php 
include "../includes/header.php";
include "../includes/conexao.php";
?>

<main>
    <link rel="stylesheet" href="../css/produtos-listar.css">
    <br>
    <h2 class="container-fluid">Todos os produtos</h2>
    <a class="container-fluid" href="./produtos-cadastrar.php">Adicionar novo Produto</a>
    <div class="table-responsive">
        <table class="table table-hover border">
        <thead>
            <tr>
                <th scope="col">NOME</th>
                <th scope="col">DESCRIÇÃO</th>
                <th scope="col">PREÇO</th>
                <th scope="col">AÇÕES</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT id, nome, descricao, unidade, REPLACE(preco, '.', ',' ) AS preco FROM produtos";
        $resultado = mysqli_query($conexao, $sql);

        while($linha = mysqli_fetch_assoc($resultado)){
            echo "<tr>";
            echo "<td> {$linha['nome']} </td>";
            echo "<td> {$linha['descricao']} </td>";
            echo "<td> R$ {$linha['preco']} </td>";

            echo "<td>";
            echo "<a href ='produtos-excluir.php?id={$linha['id']}'>";
            echo "<img src='../img/lixeira.svg' width='25'>";
            echo "</a>";
            echo "<a href ='produtos-editar.php?id={$linha['id']}'>";
            echo "<img src='../img/editar.svg' width='25'>";
            echo "</a>";
            echo "</td>";
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
        </tbody>
        </table>
    </div>
</main>
<?php include "../includes/footer.php"; ?>
