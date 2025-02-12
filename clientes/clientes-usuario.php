<?php 
    include "../includes/header.php" ;
?>
<?php 
    include "../includes/conexao.php";

    $id = $_GET["id"];
    $sql = "UPDATE clientes set tipoDeUsuario = 'usuario' where id = '$id'";
    $resultado = mysqli_query($conexao, $sql);
    $sql_tabela = "DROP TABLE IF EXISTS agenda_" . intval($id);
    $resultado = mysqli_query($conexao, $sql_tabela);
    mysqli_close($conexao);
    header("Location: ./clientes-listar.php");
?>
<?php include "../includes/footer.php"?>