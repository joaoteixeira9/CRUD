<?php
    include "./usuario-header.php";
?>
<main>
<?php
    session_start();
    $nome = $_SESSION['nome'];
    echo "<br>
    <div class='alert text-center' role='alert'>
        <h2 class='display-4 text-capitalize'>Olá, " .($nome) . "!</h2>
        <p class='lead'>Bem-vindo(a) de volta ao nosso sistema.</p>
    </div>";
?>

</main>
<?php
    include "./footer.php";
?>