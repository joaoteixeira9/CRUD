<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="../css/login.css">

<section class="container mt-5">
  <form action="./login-autenticar.php" method="post" class="formulario">
    <div class="d-flex mb-3">
      <a href="../index.html" class="btn btn-secondary">Voltar</a>>
    </div>
    
    <img src="../img/usuario.png" alt="">

    <div class="form-group">
      <label for="email">Endereço de Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Digite seu email" name="email" required>
      <div id="alertaEmail" class="text-danger"></div> 
    </div>

    <div class="form-group">
      <label for="senha">Senha:</label>
      <input type="password" class="form-control" id="senha" placeholder="Digite sua senha" name="senha" required>
      <div id="alertaSenha" class="text-danger"></div> 
    </div>

    <button type="submit" class="btn btn-primary btn-block">Entrar</button>
    <a href="../clientes/clientes-cadastro.php" class="d-block text-center mt-2">CADASTRE-SE</a>
  </form>
</section>

<script src="./validacao.js"></script>
<script src="./login.js"></script>

