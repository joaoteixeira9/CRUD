<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/login.css">
  <title>Entrar</title>
</head>
<body>
<section>
  <form action="./login-autenticar.php" method="post" class="formulario">
    <div class="d-flex">
      <a href="../index.html"><p>Voltar</p></a>
    </div>
    <img src="../img/usuario.png" alt="">
    <div class="form-group">
      <label for="exampleInputEmail1">Endereço de email</label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Digite seu email" name="email">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Senha</label>
      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Digite sua senha" name="senha">
    </div>
      
    <button type="submit" class="btn btn-primary">Entrar</button>
    <a href="../clientes/clientes-cadastro.php" class="cadastre">CADASTRE-SE</a>
  </form>
</section>
</body>
</html>