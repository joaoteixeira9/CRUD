<?php 
    include "../includes/header.php"; 
    include "../includes/conexao.php"
    ?>
<main>
    <h2>Adicionar novo funcionário</h2>
    <form action="funcionarios-salvar.php" method="post">
        <label>Nome: <input name="nome"></label> <br>
        <label>Telefone: <input name="telefone"></label> <br>

        <button type="submit">Salvar</button>
    </form>
</main>
<?php include "../includes/footer.php"?>