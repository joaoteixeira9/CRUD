<?php
    include "../includes/header.php";
    include "../includes/conexao.php";
?>
<link rel="stylesheet" href="../css/home.css">
<main>
<?php
    session_start(); // Inicia a sessão
    $nome = $_SESSION['nome'];
    $id = $_SESSION['id'];
    echo "<br>
    <div class='alert text-center' role='alert'>
        <h2 class='display-4 text-capitalize'>Olá, " .($nome) . "!</h2>
        <p class='lead'>Bem-vindo(a) de volta ao nosso sistema.</p>
    </div>";

    $sqlClientes = "SELECT COUNT(*) as total_clientes FROM clientes;";
    $resClientes = mysqli_query($conexao, $sqlClientes);

    if ($resClientes) {
        $row = mysqli_fetch_assoc($resClientes);
        $totalClientes = $row['total_clientes'];
    } else {
        echo "Erro ao executar a consulta: " . mysqli_error($conexao);
    }

    mysqli_close($conexao)
?>
<div class="row">
    <div class="col-md-3">
        <div class="card text-white bg-success mb-3">
            <div class="card-header">Usuários Registrados</div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $totalClientes ?></h5>
                <p class="card-text">Usuários ativos no sistema.</p>
            </div>
        </div>
    </div>
</div>
</main>
<?php
    include "../includes/footer.php";
?>