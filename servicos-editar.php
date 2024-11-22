<?php 
    include "header.php" ;
?>
<?php
    $id = $_GET["id"];
    $sql = "select * from servicos where id = $id";
    $servico = $descricao = $preco = "";

    include "conexao.php";
    $resultado = mysqli_query($conexao, $sql)
?>
<main>

    <h2>Editar serviço</h2>
    <form method="post" action="servicos-atualizar.php">
        <label>Serviço: <input name="servico"></label> <br>
        <label>Descricao: <input name="descricao"></label> <br>
        <label>Preço: <input name="preco"></label> <br>
        <label>Categoria: <input name="categoria"></label> <br>

        <button type="submit">Salvar</button>
    </form>
</main>

<?php include "footer.php"?>