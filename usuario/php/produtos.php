<?php
    include "./usuario-header.php";
    include "../../includes/conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Estilos personalizados (opcional) */
        .produto {
            transition: transform 0.3s ease;
        }
        .produto:hover {
            transform: scale(1.05);
        }
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <section id="produtos" class="py-5">
        <div class="container">
            <h1 class="text-center mb-5">Nossos Produtos</h1>
            <div class="row">
                <?php
                    $sql = "SELECT * FROM PRODUTOS";
                    $res = mysqli_query($conexao, $sql);
                    while($l = mysqli_fetch_assoc($res)){
                        echo "<div class='col-md-4 mb-4'>";
                        echo "<div class='card produto h-100'>";
                        echo "<img src='../../img/" . $l['nome'] . ".png' class='card-img-top' alt='" . $l['nome'] . "'>";
                        echo "<div class='card-body'>";
                        echo "<h5 class='card-title'>{$l['nome']}</h5>";
                        echo "<p class='card-text'>{$l['unidade']}</p>";
                        echo "<p class='card-text'>{$l['descricao']}</p>";
                        echo "<p class='card-text font-weight-bold'>R$ {$l['preco']}</p>";
                        echo "<button class='btn btn-success add-to-cart' 
                                data-id='" . $l['id'] . "' 
                                data-nome='" . $l['nome'] . "' 
                                data-preco='" . $l['preco'] . "' 
                                data-unidade='" . $l['unidade'] . "' 
                                data-descricao='" . $l['descricao'] . "' 
                                data-imagem='../../img/" . $l['nome'] . ".png'> 
                                Adicionar ao Carrinho
                              </button>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    }
                    mysqli_close($conexao);
                ?>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../js/carrinho.js"></script>

    <?php
        include './footer.php';
    ?>
</body>
</html>