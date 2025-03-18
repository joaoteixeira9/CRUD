document.addEventListener('DOMContentLoaded', function() {
    const addToCartButtons = document.querySelectorAll('.add-to-cart');

    addToCartButtons.forEach(button => {
        button.addEventListener('click', addToCart);
    });

    function addToCart(event) {
        const button = event.target;
        const product = {
            id: button.getAttribute('data-id'),
            nome: button.getAttribute('data-nome'),
            preco: button.getAttribute('data-preco'),
            unidade: button.getAttribute('data-unidade'),
            descricao: button.getAttribute('data-descricao'),
            imagem: button.getAttribute('data-imagem')
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
            cartItemsContainer.innerHTML = '<p>Seu carrinho está vazio.</p>';
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
                            <p class="card-text">R$ ${item.preco}</p>
                            <button class="btn btn-danger" onclick="removeFromCart(${index})">Remover</button>
                        </div>
                    </div>
                `;
                cartItemsContainer.appendChild(itemElement);
                totalPrice += parseFloat(item.preco);
            });
        }

        totalPriceElement.textContent = totalPrice.toFixed(2);
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