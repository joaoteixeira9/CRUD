<?php 
    include "usuario-header.php";
    include "../../includes/conexao.php";
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/agenda-barbeiro.css">
    <title>Selecione seu barbeiro</title>
</head>
<body>
    <div class="container text-center my-5">
        <h3 class="mb-4">Selecione um profissional:</h3>
        <?php
            // Primeiro profissional
            $sql = "SELECT * FROM funcionarios WHERE id = 1";
            $res = mysqli_query($conexao, $sql);
            while ($l = mysqli_fetch_assoc($res)) {
                echo "<a href='agenda-agendar.php'><button class='btn btn-lg mx-3 mb-3 text-uppercase' value='{$l['id']}'>{$l['nome']}</button></a>";
            }

            // Segundo profissional
            $sql = "SELECT * FROM funcionarios WHERE id = 2";
            $res = mysqli_query($conexao, $sql);
            while ($l = mysqli_fetch_assoc($res)) {
                echo "<a href=''><button class='btn btn-lg mx-3 mb-3 text-uppercase' value='{$l['id']}'>{$l['nome']}</button></a>";
            }

            // Terceiro profissional
            $sql = "SELECT * FROM funcionarios WHERE id = 3";
            $res = mysqli_query($conexao, $sql);
            while ($l = mysqli_fetch_assoc($res)) {
                echo "<a href=''><button class='btn btn-lg mx-3 mb-3 text-uppercase' value='{$l['id']}'>{$l['nome']}</button></a>";
            }
        ?>
    </div>
</body>
</html>
<?php
    include "footer.php";
?>
