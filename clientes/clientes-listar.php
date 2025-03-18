<?php 
include "../includes/header.php";
include "../includes/conexao.php"; 
?>
<main>
<link rel="stylesheet" href="../css/clientes-listar.css">
    <link rel="stylesheet" href="clientes-listar">
    <br>
    <h2 class="container-fluid text-center">Todos os clientes</h2>

    <div class="container">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover mt-4">
            <thead class="thead-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NOME    </th>
                    <th scope="col">TELEFONE</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">TIPO DE USUÁRIO</th>
                    <th scope="col">AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $sql = "SELECT * FROM clientes";
                    $resultado = mysqli_query($conexao, $sql);
                    while ($linha = mysqli_fetch_assoc($resultado)) {
                        echo "<tr>";
                        echo "<td> {$linha['id']} </td>"; 
                        echo "<td> {$linha['nome']} </td>";
                        echo "<td> {$linha['telefone']} </td>";
                        echo "<td> {$linha['email']} </td>";
                        echo "<td> {$linha['tipoDeUsuario']} </td>";
                        echo "<td>";

                        // Condicional para verificar o tipo de usuário
                        if ($linha['tipoDeUsuario'] == 'usuario') {
                            // Para um cliente, o botão vai mudar para admin
                            echo "<a href='#' class='btn btn-warning btn-sm confirm-action' data-id='{$linha['id']}' data-action='admin'>Tornar Admin</a>";
                        } elseif ($linha['tipoDeUsuario'] == 'admin') {
                            // Para um admin, o botão vai mudar para usuário
                            echo "<a href='#' class='btn btn-info btn-sm confirm-action' data-id='{$linha['id']}' data-action='usuario'>Tornar Usuário</a>";
                        }

                        echo "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Modal de Confirmação -->
    <div class="modal" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Confirmação</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Você tem certeza que deseja alterar o tipo de usuário?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="confirmAction">Confirmar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script>
        // Variáveis para armazenar o ID do cliente e a ação a ser realizada
        var clientId = null;
        var action = null;

        // Quando o link de ação é clicado
        $(".confirm-action").click(function(e) {
            e.preventDefault();
            clientId = $(this).data("id");
            action = $(this).data("action");
            $("#confirmModal").modal("show");
        });

        // Quando o usuário confirmar a ação no modal
        $("#confirmAction").click(function() {
            if (action && clientId) {
                // Redirecionar para a página de confirmação de ação
                window.location.href = `./clientes-${action}.php?id=${clientId}`;
            }
        });
    </script>
</main>
<?php include "../includes/footer.php" ?>