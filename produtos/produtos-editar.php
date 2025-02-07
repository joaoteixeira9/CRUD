<?php include "../includes/header.php"; ?>
<?php
$id = $_GET['id'];
$sql = "select * from produtos where id = $id";
$nome = $descricao = $preco = "";

include "../includes/conexao.php";
$resultado = mysqli_query($conexao, $sql);
while($linha = mysqli_fetch_assoc($resultado)){
    $nome = $linha['nome'];
    $descricao = $linha['descricao'];
    $preco = $linha['preco'];
}

mysqli_close($conexao);

?>
<main>
    <link rel="stylesheet" href="../css/produtos-editar.css">
    <h2>Editar Produtos</h2>
    <form method="post" action="./produtos-atualizar.php?id=<?=$id;?>">
        <label>NOME:<input name="nome" class="form-control" value="<?=$nome;?>"></label><br>
        <label>DESCRIÇÃO<input name="descricao" class="form-control" value="<?=$descricao;?>"></label><br>
        <label>PREÇO:<input name="preco" class="form-control" value="<?=$preco;?>"></label><br>

        <button type="submit" class="btn btn-outline-primary">Editar</button>
    </form>
</main>

<?php include "../includes/footer.php"; ?>