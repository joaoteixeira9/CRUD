<?php 
include "header.php"; 
include "conexao.php";
?>

<main>
    <link rel="stylesheet" href="agendas-listar.css">
    <br>
    <h2 class="container-fluid">Todos os serviços</h2>
    <a class="container-fluid" href="agendas-cadastrar.php">Adicionar nova agenda</a>
    
    <table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">FUNCIONARIO</th>
            <th scope="col">DATA</th>
            <th scope="col">HORARIO</th>
            <th scope="col">SERVICOS</th>
            <th scope="col">EXCLUIR</th>
            <th scope="col">EDITAR</th>
        </tr>
    </thead>
    <?php
    $sql = "select * from agendas";
    $resultado = mysqli_query($conexao, $sql);
    echo "<br><br>";

    while ($linha = mysqli_fetch_assoc($resultado)) {
        echo "<tbody>";
        echo "<tr>"; //começo coluna
        echo "<td> {$linha['funcionario']} </td>"; // {} => interpolação de strings
        echo "<td> {$linha['data']} </td>";
        echo "<td> {$linha['horario']} </td>";
        echo "<td> {$linha['servico']} </td>";
        

        echo "<td>"; //começo ações
        // excluir linhas de serviços
        echo "<a href='agendas-excluir.php?id={$linha['id']}'>";
        echo "<img src='img/lixeira.svg' alt=''>";
        echo "</a>";
        // fim excluir linhas de serviços
        
        //editar linhas de serviços
        echo "<a href='agendas-editar.php?id={$linha['id']}'>";
        echo "<img src='img/editar.svg' alt=''>";
        echo "</a>";
        //fim //editar linhas de serviços

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

<?php include "footer.php"; ?>