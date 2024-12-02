<?php 
    include "header.php" ;
?>
<?php 
    include "conexao.php";


    $id = $_GET["id"];
    $sql = "SELECT * FROM fornecedores WHERE id = '$id'";
    $nome = $telefone = $email = $endereco = $produto = $acoes = "";
    
    $resultado = mysqli_query($conexao, $sql);
    while ($l = mysqli_fetch_assoc($resultado)) {
        $nome = $l['nome'];
        $telefone = $l['telefone'];
        $email = $l['email'];
        $endereco = $l['endereco'];
        $produto = $l['produto'];
        $acoes = $l['acoes'];
    }
    mysqli_close($conexao);
?>
<main>
    <h2>Editar um fornecedor</h2>
    <form method="post" action="fornecedores-atualizar.php?id=<?=$id;?>">
        <label>Nome: <input name="nome" value="<?=$nome;?>"></label> <br>
        <label>Telefone: <input name="telefone" value="<?=$telefone;?>"></label> <br>
        <label>Email: <input name="email" value="<?=$email;?>"></label> <br>
        <label>Endereço: <input name="endereco" value="<?=$endereco;?>"></label> <br>
        <label>Produto: <input name="produto" value="<?=$produto;?>"></label> <br>
        <label>Açoes: <input name="acoes" value="<?=$acoes;?>"></label> <br>
        <button type="submit">salvar</button>
    </form>
</main>
<?php include "footer.php"?>