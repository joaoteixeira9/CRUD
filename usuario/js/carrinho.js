document.addEventListener('DOMContentLoaded', function() {
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    const checkoutButton = document.getElementById('checkout-btn');

    addToCartButtons.forEach(button => {
        button.addEventListener('click', addToCart);
    });

    // Evento para finalizar a compra
    checkoutButton.addEventListener('click', function(event) {
        event.preventDefault(); // Evita o redirecionamento padrão

        // Salva o preço total no sessionStorage antes de limpar o carrinho
        const totalPrice = document.getElementById('total-price').textContent;
        sessionStorage.setItem('lastTotalPrice', totalPrice);

        // Limpa o carrinho
        localStorage.removeItem('cart');

        // Redireciona para a página de checkout
        window.location.href = 'checkout.php';
    });

    function addToCart(event) {
        const button = event.target;
        const product = {
            id: button.getAttribute('data-id'),
            nome: button.getAttribute('data-nome'),
            preco: button.getAttribute('data-preco'),
            unidade: button.getAttribute('data-unidade'),
            descricao: button.getAttribute('data-descricao'),
            imagem: button.getAttribute('data-imagem') // Usa o caminho correto da imagem
        };

        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        cart.push(product);
        localStorage.setItem('cart', JSON.stringify(cart));

        alert('Produto adicionado ao carrinho!');
        updateCartUI();
    }

    function updateCartUI() {
        const cartItemsContainer = document.getElementById('cart-items');
        const totalPriceElement = document.getElementById('total-price');
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        let totalPrice = 0;
    
        cartItemsContainer.innerHTML = '';
    
        if (cart.length === 0) {
            const lastTotalPrice = sessionStorage.getItem('lastTotalPrice');
            if (lastTotalPrice) {
                cartItemsContainer.innerHTML = '<p>Seu carrinho está vazio.</p>';
                totalPriceElement.textContent = lastTotalPrice;
            } else {
                cartItemsContainer.innerHTML = '<p>Seu carrinho está vazio.</p>';
                totalPriceElement.textContent = '0,00';
            }
        } else {
            cart.forEach((item, index) => {
                const itemElement = document.createElement('div');
                itemElement.classList.add('col-md-4', 'mb-4');
                itemElement.innerHTML = `
                    <div class="card">
                        <div class="image-container" style="width: 100%; height: 150px; overflow: hidden;">
                            <img src="${item.imagem}" class="card-img-top img-fluid" alt="${item.nome}" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">${item.nome}</h5>
                            <p class="card-text">${item.descricao}</p>
                            <p class="card-text">${item.unidade}</p>
                            <p class="card-text">${item.preco}</p>
                            <button class="btn btn-danger" onclick="removeFromCart(${index})">Remover</button>
                        </div>
                    </div>
                `;
                cartItemsContainer.appendChild(itemElement);
    
                // Converte o preço para número antes de somar
                const precoNumerico = parseFloat(item.preco.replace("R$ ", "").replace(",", "."));
                if (!isNaN(precoNumerico)) {
                    totalPrice += precoNumerico;
                }
            });
    
            // Formata o total com duas casas decimais e substitui o ponto por vírgula
            totalPriceElement.textContent = totalPrice.toFixed(2).replace(".", ",");
        }
    }

    window.removeFromCart = function(index) {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        cart.splice(index, 1);
        localStorage.setItem('cart', JSON.stringify(cart));
        updateCartUI();
    }

    // Atualiza a UI do carrinho quando a página é carregada
    updateCartUI();
});

function atualizarBotaoFinalizarCompra() {
    const totalPrice = parseFloat(document.getElementById("total-price").textContent.replace(",", ".")); 
    const checkoutBtn = document.getElementById("checkout-btn");

    if (totalPrice > 0) {
        checkoutBtn.style.display = "inline-block"; // Mostra o botão
    } else {
        checkoutBtn.style.display = "none"; // Oculta o botão
    }
}

// Executa a função ao carregar a página
document.addEventListener("DOMContentLoaded", function() {
    atualizarBotaoFinalizarCompra();
});