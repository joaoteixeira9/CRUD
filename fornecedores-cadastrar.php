<?php include "header.php"; include "conexao.php"?>
<main>
    <h2>Adicionar novo Fornecedor</h2>
    <form action="fornecedores-salvar.php" method="post">
        <label>Nome: <input name="nome"></label> <br>
        <label>Telefone: <input name="telefone"></label> <br>
        <label>Email: <input name="email"></label> <br>
        <label>Endereço: <input name="endereco"></label> <br>
        <label>Produto: <input name="produto"></label> <br>
        <label>Açoes: <input name="acoes"></label> <br>


        <button type="submit">Salvar</button>
    </form>
</main>
<?php include "footer.php"?>