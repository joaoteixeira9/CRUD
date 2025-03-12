<?php 
    include "../includes/header.php";
    include "../includes/conexao.php";

    $id = $_GET["id"];
    $sql = "SELECT * FROM servicos WHERE id = $id";
    $servico = $descricao = $preco = $categoria = "";

    $resultado = mysqli_query($conexao, $sql);
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $servico = $linha['servico'];
        $descricao = $linha['descricao'];
        $preco = $linha['preco'];
        $categoria = $linha['categoria'];
    }
    mysqli_close($conexao);
?>
<main class="mt-2">
    <link rel="stylesheet" href="../css/servicos-editar.css">

    <form method="post" action="./servicos-atualizar.php?id=<?= $id; ?>" onsubmit="return validarFormularioServicos()" class="border p-4 rounded">
        <h2 class="mb-4">Editar serviço</h2>

        <div class="mb-3">
            <label for="s-nome" class="form-label">Serviço:</label>
            <input name="servico" id="s-nome" class="form-control" value="<?= $servico; ?>">
        </div>

        <div class="mb-3">
            <label for="s-descricao" class="form-label">Descrição:</label>
            <input name="descricao" id="s-descricao" class="form-control" value="<?= $descricao; ?>">
        </div>

        <div class="mb-3">
            <label for="s-preco" class="form-label">Preço:</label>
            <input name="preco" id="s-preco" class="form-control" value="<?= $preco; ?>">
        </div>

        <div class="mb-3">
            <label for="s-categoria" class="form-label">Categoria:</label>
            <input name="categoria" id="s-categoria" class="form-control" value="<?= $categoria; ?>">
        </div>

        <p id="s-alert" class="text-danger"></p>

        <div class="mb-3 text-center">
            <button type="submit" class="btn btn-outline-primary">Editar</button>
        </div>
    </form>
</main>

<script src="../js/validar.js"></script>
<?php include "../includes/footer.php"; ?>
