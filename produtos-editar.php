<?php include "header.php"; ?>
<?php
$id = $_GET['id'];
$sql = "select * from produtos where id = $id";
$nome = $categoria = $descricao = $validade = $preço = "";

include "conexao.php";
$resultado = mysqli_query($conexao, $sql);
while($linha = mysqli_fetch_assoc($resultado)){
    $nome = $linha['nome'];
    $categoria = $linha['categoria'];
    $descricao = $linha['descricao'];
    $validade = $linha['validade'];
    $preço = $linha['preco'];
}

mysqli_close($conexao);

?>
<main>
    <h2>Editar Produtos</h2>
    <form method="post" action="produtos-atualizar.php?id=<?=$id;?>">
        <label>NOME:<input name="nome" value="<?=$nome;?>"></label><br>
        <label>CATEGORIA:<input name="categoria" value="<?=$categoria;?>"></label><br>
        <label>DESCRIÇÃO<input name="descricao" value="<?=$descricao;?>"></label><br>
        <label>VALIDADE:<input name="validade" value="<?=$validade;?>"></label><br>
        <label>PREÇO:<input name="preco" value="<?=$preco;?>"></label><br>

        <button type="submit">Salvar</button>
    </form>
</main>

<?php include "footer.php"; ?>