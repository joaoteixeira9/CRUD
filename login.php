<?php
    include "conexao.php";
    // session_start();
    
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM clientes WHERE email = '$email' AND senha = '$senha'";
    $resultado = mysqli_query($conexao, $sql);
    while($l = mysqli_fetch_assoc($resultado)){
    }

    if (mysqli_num_rows($resultado) > 0) {
        header("Location: home.php");
        // $_SESSION['nome'] = $usuario['nome'];
        exit();
    }else{
        echo "Informações inválidas!";
    }

    mysqli_close($conexao);
?>