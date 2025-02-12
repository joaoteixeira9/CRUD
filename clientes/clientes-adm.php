<?php 
    include "../includes/header.php" ;
    include "../includes/conexao.php";
?>
<?php 
    $id = $_GET["id"];

    $sql = "UPDATE clientes SET tipoDeUsuario = 'admin' WHERE id = '$id'"; 
    $resultado = mysqli_query($conexao, $sql);

    $sql_tabela = "CREATE TABLE agenda_" . intval($id) . " (
        `id` INT(11) NOT NULL AUTO_INCREMENT,
        `clienteId` INT(11) NOT NULL,
        `profissionalId` INT(11) NOT NULL,
        `servicoId` INT(11) NOT NULL,
        `data` DATE NOT NULL,
        `horarioId` VARCHAR(100) NOT NULL,
        PRIMARY KEY (`id`)
    );";
    $resultado = mysqli_query($conexao, $sql_tabela);

    mysqli_close($conexao);
    header("Location: ./clientes-listar.php");
?>
<?php include "../includes/footer.php"?>