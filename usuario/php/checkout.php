<?php
    include "./usuario-header.php";
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<section id="checkout">
    <div class="container">
        <h2 class="my-4">Compra Finalizada</h2>
        
        <!-- Exibe o total -->
        <div id="checkout-total">
            <h3>Total: R$ <span id="checkout-total-price">0,00</span></h3>
        </div>

        <!-- Botão de Pagamento do Mercado Pago -->
        <div id="mercado-pago-button" class="mt-4"></div>
    </div>
</section>

<!-- SDK do Mercado Pago -->
<script src="https://sdk.mercadopago.com/js/v2"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Recupera os itens do carrinho do localStorage
        const cart = JSON.parse(localStorage.getItem('cart')) || [];
        const checkoutTotalPriceElement = document.getElementById('checkout-total-price');
        let totalPrice = 0;

        // Calcula o total
        cart.forEach(item => {
            totalPrice += parseFloat(item.preco);
        });

        // Exibe o total
        checkoutTotalPriceElement.textContent = totalPrice.toFixed(2);

        // Configuração do Mercado Pago
        const mp = new MercadoPago('SUA_PUBLIC_KEY', {
            locale: 'pt-BR'
        });

        // Envia o total para o backend e gera a preferência de pagamento
        fetch('gerar_preferencia.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ total: totalPrice })
        })
        .then(response => response.json())
        .then(data => {
            // Cria o botão de pagamento com a preferência gerada
            mp.checkout({
                preference: {
                    id: data.id // ID da preferência gerada no backend
                },
                render: {
                    container: '#mercado-pago-button',
                    label: 'Pagar com Mercado Pago',
                    type: 'wallet', // Tipo de botão
                }
            });
        })
        .catch(error => {
            console.error('Erro ao gerar preferência de pagamento:', error);
        });
    });
</script>

<?php
    include "./footer.php";
?>