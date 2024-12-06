<?php include "header.php"; include "conexao.php"; ?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Cadastro de Fornecedores</title>
</head>
<body>
<form>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nome">Nome:</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Nome do Fornecedor">
    </div>
    <div class="form-group col-md-6">
      <label for="telefone">Telefone:</label>
      <input type="text" class="form-control" id="inputPassword4" placeholder="Tel">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Endereço</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="Rua dos Bobos, nº 0">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Produto/label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartamento, hotel, casa, etc.">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity"> <q>Quantidade</q></label>
      <input type="text" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-4">
      <label for="inputEstado">Descrição</label>
      <select id="inputEstado" class="form-control">
        <option selected>Escolher...</option>
        <option>...</option>
      </select>
    </div>
    
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Clique em mim
      </label>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Entrar</button>
</form>
    <header>
        <h1>Formulário de Cadastro de Fornecedores</h1>
    </header>
    <main>
        <h2>Preencha os dados</h2>
        <form action="fornecedores-salvar.php" method="post">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="telefone">Telefone:</label>
            <input type="tel" id="telefone" name="telefone" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="endereco">Endereço:</label>
            <input type="text" id="endereco" name="endereco" required>

            <label for="produto">Produto:</label>
            <input type="text" id="produto" name="produto" required>

            <label for="acoes">Ações:</label>
            <input type="text" id="acoes" name="acoes" required>

            <button type="submit">Salvar</button>
        </form>
    </main>
    <footer>
        <p>&copy; SC Cortes</p>
    </footer>
</body>
</html>