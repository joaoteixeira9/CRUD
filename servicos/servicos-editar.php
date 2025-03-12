<?php 
    include "../includes/header.php" ;
    include "../includes/conexao.php";

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
    <link rel="stylesheet" href="../css/servicos-editar.css">

    <h2>Editar serviço</h2>
    <form method="post" action="./servicos-atualizar.php?id=<?=$id;?>">
        <label>Serviço: <input name="servico" class="form-control" value="<?=$servico;?>"></label> <br>
        <label>Descricao: <input name="descricao" class="form-control" value="<?=$descricao;?>"></label> <br>
        <label>Preço: <input name="preco" class="form-control" value="<?=$preco;?>"></label> <br>
        <label>Categoria: <input name="categoria" class="form-control" value="<?=$categoria;?>"></label> <br>

        <button type="submit" class="btn btn-outline-primary">Editar</button>
    </form>


</main>
<?php include "../includes/footer.php"?>