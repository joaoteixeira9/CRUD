<?php 
  include "../includes/header.php"; 
  include "../includes/conexao.php"; 
?>

<main class="mt-2">
  <link rel="stylesheet" href="../css/fornecedores-cadastrar.css">

    <!-- Nome -->
    <div class="mb-3">
      <label for="nome">Nome:</label>
      <input type="text" class="form-control" id="nome" placeholder="Nome do Fornecedor" required>
    </div>

    <!-- Telefone -->
    <div class="form-group col-md-6">
      <label for="telefone">Telefone:</label>
      <input type="text" class="form-control" id="telefone" placeholder="Tel" required>
    </div>

    <!-- Endereço -->
    <div class="form-group">
      <label for="inputAddress">Endereço:</label>
      <input type="text" class="form-control" id="inputAddress" placeholder="Rua dos Bobos, nº 0" required>
    </div>

    <!-- Produto -->
    <div class="form-group">
      <label for="inputAddress2">Produto:</label>
      <input type="text" class="form-control" id="inputAddress2" placeholder="Apartamento, hotel, casa, etc." required>
    </div>

    <!-- Pix, CNPJ, Descrição -->
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputPix">Pix:</label>
        <input type="text" class="form-control" id="inputPix" required>
      </div>

      <div class="form-group col-md-6">
        <label for="inputCnpj">CNPJ:</label>
        <input type="text" class="form-control" id="inputCnpj" required>
      </div>

      <div class="form-group col-md-4">
        <label for="inputEstado">Descrição</label>
        <select id="inputEstado" class="form-control" required>
          <option selected>Quantidade, Peso</option>
          <option>Descrição 1</option>
          <option>Descrição 2</option>
          <option>Descrição 3</option>
        </select>
      </div>
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-outline-success">Salvar</button>
  </form>
</main>

<script src="../js/validar.js"></script>

<?php include "../includes/footer.php"; ?>
