<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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
<style>
    .popup {
        display: flex;
        justify-content: center;
        align-items: center;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 1000;
        animation: fadeIn 0.5s ease;
    }

    .popup-content {
        background-color: #fff;
        padding: 30px;
        border-radius: 10px;
        text-align: center;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        animation: scaleIn 0.5s ease;
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes scaleIn {
        from { transform: scale(0.8); }
        to { transform: scale(1); }
    }

    .btn-voltar {
        margin-top: 15px;
        padding: 10px 20px;
        background-color: #85000a;
        color: white;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s;
    }

    .btn-voltar:hover {
        background-color: #db3026;
        text-decoration: none;
        color: #fff;
    }
</style>