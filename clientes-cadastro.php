<?php 
?>
<main>

    <h2>Cadastre-se</h2>

    <form method="post" action="clientes-salvar.php">
        <label>Nome: <input name="nome"></label> <br>
        <label>Telefone: <input name="telefone"></label> <br>
        <label>Email: <input name="email"></label> <br>
        <label>Senha: <input name="senha"></label> <br>

        <button type="submit">Salvar</button>
    </form>
</main>

<?php include "footer.php"?>