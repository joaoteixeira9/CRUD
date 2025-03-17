<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/header.css">
    <title>SC Cortes</title>
</head>
<body>
<header class="cabecalho">
    <nav>
        <div class="menu-toggle" id="mobile-menu">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
        <ul class="nav nav-tabs" id="nav-menu">
            <li class="nav-item">
                <a class="nav-link" href="../">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../clientes/clientes-listar.php">Clientes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../agenda/agenda-listar.php">Agenda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../servicos/servicos-listar.php">Serviços</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../produtos/produtos-listar.php">Produtos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../funcionarios/funcionarios-listar.php">Funcionários</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../fornecedores/fornecedores-listar.php">Fornecedores</a>
            </li>
            <li class="nav-item logo-container">
                <a href="../php/home.php"><img src="../img/scCortes.png" alt="Logo Barbearia SC Cortes" class="logo-image"></a>
                <a href="../php/home.php"><h1 class="fs-3 logo-text">Barbearia SC Cortes</h1></a>
            </li>
        </ul>
    </nav>
</header>

<script>// Seleciona o botão de menu e o menu de navegação
const mobileMenu = document.getElementById("mobile-menu");
const navMenu = document.getElementById("nav-menu");

// Adiciona um evento de clique ao botão de menu
mobileMenu.addEventListener("click", () => {
    navMenu.classList.toggle("active");
});

// Fecha o menu ao clicar em um link
const navLinks = document.querySelectorAll(".nav-link");
navLinks.forEach(link => {
    link.addEventListener("click", () => {
        if (window.innerWidth <= 768) {
            navMenu.classList.remove("active");
        }
    });
});</script>
</body>
</html>