<?php include "../includes/header.php" ;?>
<main class="mt-2">
    <link rel="stylesheet" href="../css/servicos-cadastrar.css">
    <form method="post" action="./servicos-salvar.php" class="border p-4 rounded" onsubmit="return validarFormularioServicos()">
        <h2 class="mb-4">Adicionar novo serviço</h2>
        <div class="mb-3">
            <label for="s-nome" class="form-label">Serviço:</label>
            <input name="servico" id="s-nome" class="form-control">
            <p id="alertS-nome"></p>
        </div>

        <div class="mb-3">
            <label for="s-descricao" class="form-label">Descrição:</label>
            <input name="descricao" id="s-descricao" class="form-control">
            <p id="alertS-descricao"></p>
        </div>

        <div class="mb-3">
            <label for="s-preco" class="form-label">Preço:</label>
            <input name="preco" id="s-preco" class="form-control">
        </div>

        <div class="mb-3">
            <label for="s-categoria" class="form-label">Categoria:</label>
            <input name="categoria" id="s-categoria" class="form-control">
        </div>

        <p id="s-alert" class="text-danger"></p>

        <div class="mb-3 text-center">
            <button type="submit" class="btn btn-outline-success">Salvar</button>
        </div>
        
    </form>
</main>
<script src="../js/validar.js"></script>
<script src="./validarServicos.js"></script>
<?php include "../includes/footer.php"?>
