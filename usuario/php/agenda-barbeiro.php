<?php 
    include "usuario-header.php";
    include "../../includes/conexao.php";
?>
    <link rel="stylesheet" href="../../css/agenda-barbeiro.css">
    <h2 class="text-center mb-4" style="color: #2c3e50;">Agendamento</h2>
    <div class="container text-center my-5">
        <h3 class="mb-4">Selecione um profissional:</h3>
        <?php
            // Primeiro profissional
            $sql = "SELECT * FROM clientes WHERE tipoDeUsuario = 'admin'";
            $res = mysqli_query($conexao, $sql);
            while ($l = mysqli_fetch_assoc($res)) {
                echo "<a href='agenda-agendar-{$l['id']}.php?id={$l['id']}'><button class='btn btn-lg mx-3 mb-3 text-uppercase' value='{$l['id']}'>{$l['nome']}</button></a>";
            }
        ?>
    </div>
<?php
    include "footer.php";
?>
