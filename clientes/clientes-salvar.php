<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/clientes-salvar.css">
    <title>SC Cortes</title>
</head>
<body>
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
</body>
</html>