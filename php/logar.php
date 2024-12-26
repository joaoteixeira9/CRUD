<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <title>Entrar</title>
</head>
<body>
<section>
  <form action="login.php" method="post" class="formulario">
      <h2>Entrar</h2>
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
      <a href="../clientes/clientes-cadastro.php">CADASTRE-SE</a>
    </form>
</section>
</body>
</html>

<style>
  html, body {
    height: 100%;
    margin: 0;
    padding: 0;
    background-color: #f7f7f7;
  }

  .formulario{
    width: 100%;
    max-width: 400px;
    align-items: center;
    padding: 15px;
    border-radius: 10px;
    background-color: #fff;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  }

  section{
    display: flex;
    justify-content: center;
    height: 100%;
    align-items: center;
  }

  .btn-primary {
    background-color: #055a9a;
    border-color: #055a9a;
    border-radius: 50px;
    width: 100%;
    padding: 10px;
    font-size: 16px;
    font-weight: 600;
    transition: 0.3s;
  }

  .btn-primary:hover {
    background-color: #034f7a;
    border-color: #034f7a;
  }
  
  .formulario a {
    display: block;
    text-align: center;
    margin-top: 15px;
    color: #055a9a;
    font-weight: 600;
    text-decoration: none;
    transition: 0.3s;
  }

  .formulario h2 {
    display: flex;
    justify-content: center;
    margin: 15px;
  }
  
  .form-control{
    border-radius: 15px;
  }

  img {
    display: block; 
    margin: 20px auto; 
    border-radius: 50%; 
    width: 150px;
    height: 150px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
  }

</style>