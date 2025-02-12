<?php
    include "./usuario-header.php";
    include "../../includes/conexao.php";
?>
<link rel="stylesheet" href="../../css/produtos.css">
<section id="produtos">
    <div class="container">
        <div class="produtos-lista">
            <?php
                $sql = "SELECT * FROM PRODUTOS";
                $res = mysqli_query($conexao, $sql);
                while($l = mysqli_fetch_assoc($res)){
                    echo "<div class='produto'>";
                    echo "<img src='../../img" . $l['nome'] . ".png' alt='" . $l['nome'] . "'>";
                    echo "<h3>{$l['nome']}</h3>";
                    echo "<p>{$l['quantidade']}</p>";
                    echo "<p>{$l['descricao']}</p>";
                    echo "<p class='preco'>R$ {$l['preco']}</p>";
                    // Corrigindo as aspas do botão
                    echo "<button class='add-to-cart' 
                            data-id='" . $l['id'] . "' 
                            data-nome='" . $l['nome'] . "' 
                            data-preco='" . $l['preco'] . "' 
                            data-quantidade='" . $l['quantidade'] . "' 
                            data-descricao='" . $l['descricao'] . "'> 
                            Adicionar ao Carrinho
                          </button>";
                    echo "</div>";
                }
                mysqli_close($conexao);
            ?>
        </div>
    </div>
</section>
<script src="./carrinho.js"></script>
<?php
    include './footer.php';
?>

