<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link rel="stylesheet" href="../css/clientes-cadastro.css">
<section>
    <form id="formulario" method="post" action="./clientes-salvar.php" class="formulario">
        <div class="d-flex">
        <a href="../index.html"><p>Voltar</p></a>
        </div>
        <img src="../img/usuario.png" alt="Ícone de usuário">
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite seu nome" required>
            <p id="alertNome"></p>
        </div>
        <div class="form-group">
            <label for="telefone">Telefone:</label>
            <input type="text" class="form-control" name="telefone" id="telefone" placeholder="Digite seu telefone" required>
            <p id="alertTel"></p>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Digite seu email" required>
            <p id="alertEmail"></p>
        </div>
        <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" class="form-control" name="senha" id="senha" placeholder="Crie uma senha" required>
            <p id="alertSenha"></p>
        </div>
        <div class="form-group">
            <label for="confirmarSenha">Confirme sua senha:</label>
            <input type="password" class="form-control" id="confirmarSenha" placeholder="Confirme sua senha" required>
            <p id="alertConfirmarSenha"></p>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Salvar</button>
        <a href="../php/login.php" class="btn btn-link btn-block">Já tem uma conta? Faça login</a>
    </form>
</section>
<script src="./alertar.js"></script>