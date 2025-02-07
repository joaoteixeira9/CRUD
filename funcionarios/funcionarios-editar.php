<?php 
    include "../includes/header.php" ;
?>
<?php 
    include "../includes/conexao.php";


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
    <link rel="stylesheet" href="../css/produtos-cadastrar.css">
    <h2>Editar um funcionário</h2>
    <form action="./funcionarios-atualizar.php?id=<?=$id;?>" method="post">
        <label>Nome: <input name="nome" class="form-control" value="<?=$nome;?>"></label> <br>
        <label>Telefone: <input name="telefone" class="form-control" value="<?=$telefone;?>"></label> <br>
        <button type="submit"class="btn btn-outline-primary">Editar</button>
    </form>
</main>
<?php include "../includes/footer.php"?>