<?php
    include "conexao.php";
    session_start();
    
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM clientes WHERE email = '$email' AND senha = '$senha'";
    $resultado = mysqli_query($conexao, $sql);
    

    if (mysqli_num_rows($resultado) > 0) {
        $l = mysqli_fetch_assoc($resultado);
        $_SESSION['nome'] = $l['nome'];
        $_SESSION['id'] = $l['id'];

        if ($l['tipoDeUsuario'] == "usuario") {
            header("Location:usuario-home.php");
        }
        else if($l['tipoDeUsuario'] == "admin"){
            header("Location: home.php");
        }
    }else{
        echo "Informações inválidas!";
    }
    
    mysqli_close($conexao);
?>