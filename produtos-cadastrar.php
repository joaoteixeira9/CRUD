<?php include "header.php"; ?>

<main>
    <h2>Adicionar novo Produto</h2>
    <form method="post" action="produtos-salvar.php">
        <label>NOME:<input name="nome"></label> <br>
        <label>CATEGORIA:<input name="categoria"></label> <br>
        <label>DESCRIÇÃO:<input name="descricao"></label> <br>
        <label>VALIDADE:<input name="validade"></label> <br><br>
        <label>PREÇO:<input name="preco"></label> <br><br>

        <button type="submit">Salvar</button>
    </form>
</main>

<?php include "footer.php"; ?>