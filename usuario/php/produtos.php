<?php
    include "./usuario-header.php";
    include "../../includes/conexao.php";
?>
    <link rel="stylesheet" href="../../css/produtos.css">
    <section id="produtos">
        <div class="container">
            <div class="produtos-lista">
    <?php
        $sql ="SELECT * FROM PRODUTOS";
        $res =mysqli_query($conexao, $sql);
        while($l = mysqli_fetch_assoc($res)){
           echo "<div class='produto'>";
                    echo"<img src='../../img/". $l['nome'].".png' alt='Shampoo para Barba '>";
                    echo "<h3>{$l['nome']}</h3>
                    <p>{$l['quantidade']}</p>
                    <p>{$l['descricao']}</p>
                    <p class='preco'>R$ {$l['preco']}</p>
                    <button>Adicionar ao Carrinho</button>
                </div>";
        }
        mysqli_close($conexao);
    ?>
            </div>
        </div>
    </section>
    <?php
    include './footer.php';
    ?>

   