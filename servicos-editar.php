<?php 
    include "header.php" ;
?>
<?php
    include "conexao.php";
    $id = $_GET["id"];
    $sql = "select * from servicos where id = $id";
    $servico = $descricao = $preco = "";

    $resultado = mysqli_query($conexao, $sql);
    while($linha = mysqli_fetch_assoc($resultado)){
        $servico = $linha['servico'];
        $descricao = $linha['descricao'];
        $preco = $linha['preco'];
        $categoria = $linha['categoria'];
    }
    mysqli_close($conexao);
?>
<main>

    <h2>Editar serviço</h2>
    <form method="post" action="servicos-atualizar.php?id=<?=$id;?>">
        <label>Serviço: <input name="servico" value="<?=$servico;?>"></label> <br>
        <label>Descricao: <input name="descricao"  value="<?=$descricao;?>"></label> <br>
        <label>Preço: <input name="preco"  value="<?=$preco;?>"></label> <br>
        <label>Categoria: <input name="categoria"  value="<?=$categoria;?>"></label> <br>

        <button type="submit">Salvar</button>
    </form>


</main>
<?php include "footer.php"?>