<?php
    include "./usuario-header.php"; 
    include "../../includes/conexao.php"; 

   
    
    session_start();
    if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
        
        header("Location: checkout.php");
        exit;
    }

    
    $cart_items = $_SESSION['cart'];
    $total_price = 0;
    foreach ($cart_items as $item) {
        $total_price += $item['price'] * $item['quantity'];
    }
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<section id="checkout">
    <div class="container">
        <h2 class="my-4">Finalizar Compra</h2>
        <div id="checkout-summary" class="row">
            <div class="col-md-6">
                <h4>Resumo do Pedido</h4>
                <ul class="list-group">
                    <?php foreach ($cart_items as $item): ?>
                        <li class="list-group-item">
                            <?php echo $item['name']; ?> x <?php echo $item['quantity']; ?> 
                            - R$ <?php echo number_format($item['price'] * $item['quantity'], 2, ',', '.'); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <hr>
                <h5>Total: R$ <?php echo number_format($total_price, 2, ',', '.'); ?></h5>
            </div>
            <div class="col-md-6">
                <h4>Informações de Pagamento</h4>
                <form action="process_checkout.php" method="POST">
                    <div class="form-group">
                        <label for="name">Nome Completo</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Endereço de Entrega</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                    <div class="form-group">
                        <label for="credit-card">Número do Cartão de Crédito</label>
                        <input type="text" class="form-control" id="credit-card" name="credit-card" required>
                    </div>
                    <div class="form-group">
                        <label for="expiration-date">Data de Validade</label>
                        <input type="text" class="form-control" id="expiration-date" name="expiration-date" required>
                    </div>
                    <div class="form-group">
                        <label for="cvv">CVV</label>
                        <input type="text" class="form-control" id="cvv" name="cvv" required>
                    </div>
                    <button type="submit" class="btn btn-success">Finalizar Compra</button>
                </form>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<?php
    include "./footer.php"; 
?>

