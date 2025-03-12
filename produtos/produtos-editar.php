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
<main class="mt-2">
    <link rel="stylesheet" href="../css/produtos-editar.css">

    <form method="post" action="./produtos-atualizar.php?id=<?=$id;?>" onsubmit="return validarFormularioProdutos()" class="border p-4 rounded">
        <h2 class="mb-4">Editar Produto</h2>

        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input name="nome" id="p-nome" class="form-control" value="<?=$nome;?>">
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição:</label>
            <input name="descricao" id="p-descricao" class="form-control" value="<?=$descricao;?>">
        </div>

        <div class="mb-3">
            <label for="preco" class="form-label">Preço:</label>
            <input name="preco" id="p-preco" class="form-control" value="<?=$preco;?>">
        </div>

        <p id="s-alert" class="text-danger"></p>

        <div class="mb-3 text-center">
            <button type="submit" class="btn btn-outline-primary mt-3">Editar</button>
        </div>
        
    </form>
</main>
<script src="../js/validar.js"></script>

<?php include "../includes/footer.php"; ?>