<?php
    include "./usuario-header.php";
    include "../../includes/conexao.php";
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<section id="carrinho">
    <div class="container">
        <h2 class="my-4">Carrinho de Compras</h2>
        <div id="cart-items" class="row">
            <p>Carregando...</p>
        </div>
        <div id="total">
            <h3>Total: R$ <span id="total-price">0,00</span></h3>
        </div>
        <button id="checkout-btn" class="btn btn-primary mt-4" onclick="window.location.href='checkout.php'">Finalizar Compra</button>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="../js/carrinho.js"></script>

<?php
    include "./footer.php";
?>
