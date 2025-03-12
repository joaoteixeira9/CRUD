<?php 
    include "../includes/header.php" ;
?>
<main>
    
    <h2>Adicionar novo serviço</h2>
    <link rel="stylesheet" href="../css/servicos-cadastrar.css">
    <form method="post" action="./servicos-salvar.php">
        <label class="form-label">Serviço: <input name="servico" class="form-control"></label> <br>
        <label>Descricao: <input name="descricao" class="form-control"></label> <br>
        <label>Preço: <input name="preco" class="form-control"></label> <br>
        <label>Categoria: <input name="categoria" class="form-control"></label> <br>

        <button type="submit" class="btn btn-outline-success">Salvar</button>
    </form>
</main>

<?php include "../includes/footer.php"?>