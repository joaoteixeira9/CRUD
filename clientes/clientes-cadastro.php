<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/clientes-cadastro.css">
    <title>Cadastrar</title>
</head>
<body>
<section>
    <form method="post" action="clientes-salvar.php" class="formulario">
        <div class="d-flex">
        <a href="../index.html"><p>Voltar</p></a>
        </div>
        <img src="../img/usuario.png" alt="Ícone de usuário">
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome" required>
        </div>
        <div class="form-group">
            <label for="telefone">Telefone:</label>
            <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Digite seu telefone" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email" required>
        </div>
        <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" class="form-control" id="senha" name="senha" placeholder="Crie uma senha" minlength="8" required >
        </div>
        <button type="submit" class="btn btn-primary btn-block">Salvar</button>
        <a href="../php/login.php" class="btn btn-link btn-block">Já tem uma conta? Faça login</a>
    </form>
</section>
<script src="./js/clientes-cadastro.js"></script>
</body>
</html>