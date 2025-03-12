<?php 
include "../includes/header.php";
include "../includes/conexao.php"; 
?>
<main>
    <link rel="stylesheet" href="clientes-listar">
    <br>

    <!-- Usando a classe container para limitar a largura -->
    <div class="container" style="max-width: 900px;"> 
        <div class="list-group">
            <?php 
                echo "<h2 class='container-fluid text-center '>Todos os clientes</h2>";
                $sql = "select * from clientes WHERE tipoDeUsuario = 'usuario'";
                $resultado = mysqli_query($conexao, $sql);
            
                while ($linha = mysqli_fetch_assoc($resultado)) {
                    echo "<div class='list-group-item list-group-item-action border rounded mb-3'>";
                    echo "<div class='d-flex justify-content-between align-items-center'>";
                    echo "<h5 class='mb-1'>{$linha['nome']}</h5>";
                    echo "<small class='text-muted'>{$linha['tipoDeUsuario']}</small>";
                    echo "</div>";

                    echo "<p class='mb-1'><strong>ID:</strong> {$linha['id']}</p>";
                    echo "<p class='mb-1'><strong>Telefone:</strong> {$linha['telefone']}</p>";
                    echo "<p class='mb-1'><strong>Email:</strong> {$linha['email']}</p>";

                    echo "<div class='d-flex justify-content-between'>";
                    echo "<a href='#' class='btn btn-warning btn-sm' data-toggle='modal' data-target='#confirmModal' data-id='{$linha['id']}' data-action='admin'>Tornar Admin</a>";
                    echo "</div>";
                    echo "</div>"; // Fechando list item
                }
            
                echo "<h2 class='container-fluid text-center '>Todos os funcionários</h2>";
                $sql = "select * from clientes WHERE tipoDeUsuario = 'admin'";
                $resultado = mysqli_query($conexao, $sql);
            
                while ($linha = mysqli_fetch_assoc($resultado)) {
                    echo "<div class='list-group-item list-group-item-action border rounded mb-3'>";
                    echo "<div class='d-flex justify-content-between align-items-center'>";
                    echo "<h5 class='mb-1'>{$linha['nome']}</h5>";
                    echo "<small class='text-muted'>{$linha['tipoDeUsuario']}</small>";
                    echo "</div>";

                    echo "<p class='mb-1'><strong>ID:</strong> {$linha['id']}</p>";
                    echo "<p class='mb-1'><strong>Telefone:</strong> {$linha['telefone']}</p>";
                    echo "<p class='mb-1'><strong>Email:</strong> {$linha['email']}</p>";

                    echo "<div class='d-flex justify-content-between'>";
                    echo "<a href='#' class='btn btn-info btn-sm' data-toggle='modal' data-target='#confirmModal' data-id='{$linha['id']}' data-action='usuario'>Tornar Usuário</a>";
                    echo "</div>";
                    echo "</div>"; // Fechando list item
                }
            ?>
        </div>
    </div>
</main>

<!-- Modal de Confirmação -->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="exampleModalLabel">Confirmação</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="lead">Tem certeza de que deseja alterar o tipo de usuário?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <a id="confirmAction" href="#" class="btn btn-primary">Confirmar</a>
      </div>
    </div>
  </div>
</div>

<script>
    // JavaScript para capturar os dados e mostrar no modal
    $('#confirmModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Botão que acionou o modal
        var userId = button.data('id'); // ID do usuário
        var action = button.data('action'); // Ação: 'admin' ou 'usuario'

        // Definindo a URL de destino
        var url = action === 'admin' ? './clientes-adm.php?id=' + userId : './clientes-usuario.php?id=' + userId;

        // Atualizando o link de confirmação com a URL correta
        $('#confirmAction').attr('href', url);
    });
</script>

<?php include "../includes/footer.php" ?>
