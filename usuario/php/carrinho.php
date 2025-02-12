<?php
    include "./usuario-header.php"; // Seu cabeçalho de usuário
?>

<link rel="stylesheet" href="../../css/produtos.css">
<section id="carrinho">
    <div class="container">
        <h2>Carrinho de Compras</h2>
        <div id="cart-items">
            <!-- Os itens do carrinho serão carregados aqui pelo JavaScript -->
            <p>Carregando...</p>
        </div>
        <div id="total">
            <h3>Total: R$ <span id="total-price">0,00</span></h3>
        </div>
        <button id="checkout-btn" onclick="window.location.href='checkout.php'">Finalizar Compra</button>
    </div>
</section>

<script src="../../js/carrinho.js"></script>

<?php
    include './footer.php'; // Seu rodapé
?>
