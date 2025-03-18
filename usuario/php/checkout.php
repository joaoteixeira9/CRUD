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

        <!-- Botão de Pagamento do Mercado Pago -->
        <div id="mercado-pago-button" class="mt-4"></div>
    </div>
</section>

<script src="https://sdk.mercadopago.com/js/v2"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Recupera o preço total do sessionStorage
        const totalPrice = sessionStorage.getItem('lastTotalPrice') || '0,00';
        document.getElementById('checkout-total-price').textContent = totalPrice;

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
            body: JSON.stringify({ total: parseFloat(totalPrice.replace(',', '.')) })
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