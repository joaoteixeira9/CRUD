<?php
    include "./usuario-header.php";
?>
<main>
<?php
    session_start();
    $nome = $_SESSION['nome'];
    echo "<br>";
    echo "Olá, $nome!";
?>

</main>
<?php
    include "./footer.php";
?>