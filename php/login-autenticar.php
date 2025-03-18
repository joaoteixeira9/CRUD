<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/login-autenticar.css">
    <title>SC Cortes</title>
</head>
<body>
<?php
    include "../includes/conexao.php";
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
            header("Location: ../usuario/php/usuario-home.php");
        }
        else if($l['tipoDeUsuario'] == "admin"){
            header("Location: ./home.php");
        }
    }else{
        echo "<div class='popup'>
        <div class='popup-content'>
            <div class='alert alert-danger' role='alert'>
                <strong>Erro!</strong> As informações fornecidas são inválidas ou o cadastro não existe.
            </div>
            <a href='javascript:history.back()' class='btn-voltar'>Voltar</a>
        </div>
      </div>";
    }
    
    mysqli_close($conexao);
?>
</body>
</html>