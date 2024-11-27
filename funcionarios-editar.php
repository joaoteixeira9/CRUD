<?php 
    include "header.php" ;
?>
<?php 
    include "conexao.php";


    $id = $_GET["id"];
    $sql = "SELECT * FROM funcionarios WHERE id = '$id'";
    $nome = $telefone = "";
    
    $resultado = mysqli_query($conexao, $sql);
    while ($l = mysqli_fetch_assoc($resultado)) {
        $nome = $l['nome'];
        $telefone = $l['telefone'];
    }
    mysqli_close($conexao);
?>
<main>
    <h2>Editar um funcionário</h2>
    <form action="funcionarios-atualizar.php?id=<?=$id;?>" method="post">
        <label>Nome: <input name="nome" value="<?=$nome;?>"></label> <br>
        <label>Telefone: <input name="telefone" value="<?=$telefone;?>"></label> <br>
        <button type="submit">Editar</button>
    </form>
</main>
<?php include "footer.php"?>