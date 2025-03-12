<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<?php
    //incluir o arquivo de conexão 
    include "../includes/conexao.php";

    //requisição de dados do formulário
    $nome = $_POST["nome"];
    $telefone = $_POST["telefone"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Verificar se o email já existe no banco de dados
    $sql_verificar_email = "SELECT * FROM clientes WHERE email = '$email'";
    $resultado_email = mysqli_query($conexao, $sql_verificar_email);

    if (mysqli_num_rows($resultado_email) > 0) {
        echo "<div class='popup'>
        <div class='popup-content'>
            <div class='alert alert-danger' role='alert'>
                <strong>Erro!</strong> Já existe um cadastro com o mesmo email. Por favor escolha outro email.
            </div>
            <a href='javascript:history.back()' class='btn-voltar'>Voltar</a>
        </div>
      </div>";
    }else {
        $sql = "INSERT INTO clientes (nome, telefone, email, senha) VALUES ('$nome', '$telefone', '$email', '$senha')";
        $resultado = mysqli_query($conexao, $sql);

        if ($resultado) {
            echo "<div class='popup'>
            <div class='popup-content'>
                <div class='alert alert-success' role='alert'>
                    <strong>Cadastro concluído!</strong> Realize o login para acessar nosso sistema!
                </div>
            <a href='../php/login.php' class='btn btn-success'>Realizar login</a>
            </div>
        </div>";
        } else {
            echo "<script>alert('Erro ao cadastrar. Tente novamente mais tarde.'); window.history.back();</script>";
        }
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