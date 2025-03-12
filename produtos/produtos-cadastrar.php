<?php include "../includes/header.php"; ?>

<main class="mt-2">
    <link rel="stylesheet" href="../css/produtos-cadastrar.css">
    
    <form method="post" action="./produtos-salvar.php" enctype="multipart/form-data" class="border p-4 rounded" onsubmit="return validarFormularioProdutos()">
        <h2 class="mb-4">Adicionar novo Produto</h2>
        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" name="nome" id="p-nome" class="form-control">
        </div>
        
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição:</label>
            <input type="text" name="descricao" id="p-descricao" class="form-control">
        </div>
        
        <div class="mb-3">
            <label for="preco" class="form-label">Preço:</label>
            <input type="text" name="preco" id="p-preco" class="form-control">
        </div>
        
        <div class="mb-3">
            <label for="foto" class="form-label">Foto:</label>
            <input type="file" name="foto" id="p-foto" class="form-control text-white pb-5 pt-3 w-50">
        </div>

        <p id="s-alert" class="text-danger"></p>

        <div class="mb-3 text-center">
            <button type="submit" class="btn btn-outline-success">Salvar</button>
        </div>
        
    </form>
</main>
<script src="../js/validar.js"></script>

<?php include "../includes/footer.php"; ?>