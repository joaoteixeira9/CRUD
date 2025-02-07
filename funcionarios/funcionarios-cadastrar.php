<?php 
    include "../includes/header.php"; 
    include "../includes/conexao.php"
    ?>
<main>
    <link rel="stylesheet" href="../css/produtos-cadastrar.css">
    <h2>Adicionar novo funcionário</h2>
    <form action="funcionarios-salvar.php" method="post">
        <label>Nome: <input name="nome" class="form-control"></label> <br>
        <label>Telefone: <input name="telefone" class="form-control"></label> <br>

        <button type="submit" class="btn btn-outline-success">Salvar</button>
    </form>
</main>
<?php include "../includes/footer.php"?>