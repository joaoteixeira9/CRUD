<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="../css/login.css">
<section>
  <form action="./login-autenticar.php" method="post" class="formulario">
    <div class="d-flex">
      <a href="../index.html">
        <p>Voltar</p>
      </a>
    </div>
    <img src="../img/usuario.png" alt="">
    <div class="form-group">
      <label for="exampleInputEmail1">Endereço de email</label>
      <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Digite seu email" name="email">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Senha</label>
      <input type="password" class="form-control" id="senha" placeholder="Digite sua senha" name="senha">
    </div>
    <div class="form-group">
      <p id="alertaEmail"></p>
    </div>
    <button type="submit" class="btn btn-primary">Entrar</button>
    <a href="../clientes/clientes-cadastro.php" class="cadastre">CADASTRE-SE</a>
  </form>
</section>