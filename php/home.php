<?php
    include "../includes/header.php";
?>
<main>
<?php
    session_start(); // Inicia a sessão
    $nome = $_SESSION['nome'];
    echo "<br>";
    echo "Olá, $nome!";
?>

</main>
<?php
    include "../includes/footer.php";
?>