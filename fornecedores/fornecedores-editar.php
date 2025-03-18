<?php
    include "../includes/header.php";
    include "../includes/conexao.php";
 
    $id = $_GET["id"];
    $sql = "SELECT * FROM fornecedores WHERE id = $id";
    $nome = $telefone = $endereco = $produto = $pix = $cnpj = $descricao = "";
 
    $resultado = mysqli_query($conexao, $sql);
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $nome = $linha['nome'];
        $telefone = $linha['telefone'];
        $endereco = $linha['endereco'];
        $produto = $linha['produto'];
        $pix = $linha['pix'];
        $cnpj = $linha['cnpj'];
        $descricao = $linha['descricao'];
    }
    mysqli_close($conexao);
?>
<main class="mt-2">
    <link rel="stylesheet" href="../css/fornecedores-editar.css">
 
    <form method="post" action="./fornecedores-atualizar.php?id=<?= $id; ?>" onsubmit="return validarFormularioFornecedores()" class="border p-4 rounded">
        <h2 class="mb-4">Editar fornecedores</h2>
 
        <div class="mb-3">
            <label for="s-nome" class="form-label">Nome:</label>
            <input name="nome" id="s-nome" class="form-control" value="<?= $nome; ?>">
        </div>
 
        <div class="mb-3">
            <label for="s-telefone" class="form-label">Telefone:</label>
            <input name="telefone" id="s-telefone" class="form-control" value="<?= $telefone; ?>">
        </div>
 
        <div class="mb-3">
            <label for="s-produto" class="form-label">Produto:</label>
            <input name="produto" id="s-produto" class="form-control" value="<?= $produto; ?>">
        </div>
        <div class="mb-3">
            <label for="s-pix" class="form-label">Pix:</label>
            <input name="pix" id="s-pix" class="form-control" value="<?= $pix; ?>">
        </div>
        <div class="mb-3">
            <label for="s-cnpj" class="form-label">Cnpj:</label>
            <input name="cnpj" id="s-cnpj" class="form-control" value="<?= $cnpj; ?>">
        </div>
 
        <div class="mb-3 text-center">
            <button type="submit" class="btn btn-outline-primary">Editar</button>
        </div>
    </form>
</main>
<script src="../js/validar.js"></script>
<?php include "../includes/footer.php"; ?>
 