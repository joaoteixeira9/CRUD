<?php
    include "./usuario-header.php";
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<section id="checkout">
    <div class="container">
        <h2 class="my-4">Compra Finalizada</h2>
        <div id="checkout-items" class="row">
        </div>
        <div id="checkout-total">
            <h3>Total: R$ <span id="checkout-total-price">0,00</span></h3>
        </div>
        <div class="mt-4"></div>
    </div>
</section>

<script src="https://sdk.mercadopago.com/js/v2"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Recupera o preço total do sessionStorage
        const totalPrice = sessionStorage.getItem('lastTotalPrice') || '0,00';
        document.getElementById('checkout-total-price').textContent = totalPrice;

        // Limpa os itens do carrinho no sessionStorage
        sessionStorage.removeItem('cartItems');
        sessionStorage.removeItem('lastTotalPrice');

        // Limpa a exibição dos itens no checkout
        const checkoutItemsContainer = document.getElementById('checkout-items');
        checkoutItemsContainer.innerHTML = '';

        setTimeout(function() {
        window.location.href = "/crud/usuario/php/produtos.php";
    }, 2000);
    });
</script>

<?php
    include "./footer.php";
?>
