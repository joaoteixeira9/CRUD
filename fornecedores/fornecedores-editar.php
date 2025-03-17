<?php 
    include "header.php" ;
    include "conexao.php";

    $id = $_GET["id"];
    $sql = "SELECT * FROM fornecedores WHERE id = '$id'";
    $nome = $telefone = $endereco = $produto = $pix = $CNPJ = "";
    
    $resultado = mysqli_query($conexao, $sql);
    while ($l = mysqli_fetch_assoc($resultado)) {
        $nome = $l['nome'];
        $telefone = $l['telefone'];
        $endereco = $l['endereco'];
        $produto = $l['produto'];
        $pix = $l['pix'];
        $CNPJ = $l['cnpjJ'];
        $acoes = $l['acoes'];
    }
    mysqli_close($conexao);
?>

<main>
    <h2>Editar um fornecedor</h2>
    <form method="post" action="fornecedores-atualizar.php?id=<?=$id;?>">
        <label>Nome: <input name="nome" value="<?=$nome;?>"></label> <br>
        <label>Telefone: <input name="telefone" value="<?=$telefone;?>"></label> <br>
        <label>Endereco: <input name="endereco" value="<?=$endereco;?>"></label> <br>
        <label>Produto: <input name="produto" value="<?=$produto;?>"></label> <br>
        <label>Pix: <input name="pix" value="<?=$pix;?>"></label> <br>
        <label>Cnpj: <input name="cnpj" value="<?=$cnpj;?>"></label> <br>
        <label>Açoes: <input name="acoes" value="<?=$acoes;?>"></label> <br>
        <button type="submit">salvar</button>
    </form>
</main>

<?php include "footer.php"?>