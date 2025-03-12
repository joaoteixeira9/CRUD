<?php 
    include "../includes/conexao.php";

    $id = $_GET["id"];
    $sql = "UPDATE clientes set tipoDeUsuario = 'usuario' where id = '$id'";
    $resultado = mysqli_query($conexao, $sql);
    $sql_tabela = "DROP TABLE IF EXISTS agenda_" . intval($id);
    $resultado = mysqli_query($conexao, $sql_tabela);

    $arquivoPhp = "../usuario/php/agenda-agendar-$id.php";
    if(file_exists($arquivoPhp)){
        unlink($arquivoPhp);
    }

    $arquivoSalvarPhp = "../usuario/php/agenda-salvar-$id.php";
    if(file_exists($arquivoSalvarPhp)){
        unlink($arquivoSalvarPhp);
    }

    $arquivoListarPhp = "../agenda/agenda-listar-$id.php";
    if(file_exists($arquivoListarPhp)){
        unlink($arquivoListarPhp);
    }

    mysqli_close($conexao);
    header("Location: ./clientes-listar.php");
?>