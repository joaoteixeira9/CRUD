<?php include "../includes/header.php"; ?>

<main>
    <link rel="stylesheet" href="../css/produtos-cadastrar.css">
    <h2>Adicionar novo Produto</h2>
    <form method="post" action="./produtos-salvar.php" enctype="multipart/form-data">
        <label>NOME:<input name="nome" class="form-control"></label> <br>
        <label>DESCRIÇÃO:<input name="descricao" class="form-control"></label> <br>
        <label>PREÇO:<input name="preco" class="form-control"></label> <br><br>
        <label>FOTO: <input type="file" name="foto" class="form-control bg-primary text-white"></label> <br><br>

        <button type="submit" class="btn btn-outline-success">Salvar</button>
    </form>
</main>

<?php include "../includes/footer.php"; ?>