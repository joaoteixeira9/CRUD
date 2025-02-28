<link rel="stylesheet" href="../css/agenda-listar.css">
<?php 
    include "../includes/header.php";
    include "../includes/conexao.php";
?>
    <div class="container text-center my-5">
        <h3 class="mb-4">Confira sua agenda de atendimentos</h3>
        <?php
            session_start();
            $id = $_SESSION['id'];
            $sql = "SELECT * FROM clientes WHERE tipoDeUsuario = 'admin' AND id = $id";
            $res = mysqli_query($conexao, $sql);
            while ($l = mysqli_fetch_assoc($res)) {
                echo "<a href='agenda-listar-{$l['id']}.php' data-id='{$l['id']}'><button class='btn btn-lg mx-3 mb-3 text-uppercase' value='{$l['id']}'>{$l['nome']} </button></a>";
            }
        ?>
    </div>
<?php
    include "../includes/footer.php";
?>