<?php 
  include "../includes/header.php"; 
  include "../includes/conexao.php"; 
  ?>
<form action>
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
    <label for="inputAddress2">Produto</label>
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
        <option selected>Quantidade, Peso</option>
        <option>Descrição 1</option>
        <option>Descrição 2</option>
        <option>Descrição 3</option>
      </select>
    </div>
  </div>
  
  <button type="submit" class="btn btn-outline-success">Salvar</button>
</form>
<?php include "../includes/footer.php"; ?>