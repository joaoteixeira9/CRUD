
<section id="carrinho">
    <div class="container">
        <h2>Carrinho de Compras</h2>
        <div id="cart-items">
            <p>Carregando...</p>
        </div>
        <div id="total">
            <h3>Total: R$ <span id="total-price">0,00</span></h3>
        </div>
        <button id="checkout-btn" onclick="window.location.href='checkout.php'">Finalizar Compra</button>
    </div>
</section>
<?php
    include "usuario-header.php";
    include "../../includes/conexao.php";
    include '../../footer.php';
    
    ?>


<script src="./carrinho.js"></script>

