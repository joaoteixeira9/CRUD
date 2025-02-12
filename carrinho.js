// Função que adiciona o produto ao carrinho
document.querySelectorAll('.add-to-cart').forEach(button => {
    button.addEventListener('click', function() {
        // Pega os dados do produto
        const produto = {
            id: this.getAttribute('data-id'),
            nome: this.getAttribute('data-nome'),
            preco: parseFloat(this.getAttribute('data-preco')),
        };

        // Recupera o carrinho do localStorage, ou cria um carrinho vazio
        let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];

        // Adiciona o produto ao carrinho
        carrinho.push(produto);

        // Salva o carrinho novamente no localStorage
        localStorage.setItem('carrinho', JSON.stringify(carrinho));

        // Atualiza a área do carrinho
        atualizarCarrinho();
    });
});

// Função para atualizar a área do carrinho
function atualizarCarrinho() {
    const carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
    const cartItems = document.getElementById('cart-items');

    // Limpa a lista de itens do carrinho
    if (cartItems) {
        cartItems.innerHTML = '';
        if (carrinho.length === 0) {
            cartItems.innerHTML = '<li>Seu carrinho está vazio.</li>';
        } else {
            // Exibe os produtos no carrinho
            carrinho.forEach(produto => {
                const item = document.createElement('li');
                item.textContent = `${produto.nome} - R$${produto.preco.toFixed(2)}`;
                cartItems.appendChild(item);
            });
        }
    }
}
function atualizarCarrinho() {
    const carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
    const cartItems = document.getElementById('cart-items');
    const totalPriceElement = document.getElementById('total-price');

    // Limpar a lista de itens
    cartItems.innerHTML = '';

    if (carrinho.length === 0) {
        cartItems.innerHTML = '<p>Seu carrinho está vazio.</p>';
    } else {
        let total = 0;

        // Exibe cada produto no carrinho
        carrinho.forEach((produto, index) => {
            const item = document.createElement('div');
            item.classList.add('cart-item');
            item.innerHTML = `
                <p>${produto.nome} - R$ ${produto.preco.toFixed(2)}</p>
                <button class="remove-item" data-index="${index}">Remover</button>
            `;
            cartItems.appendChild(item);

            // Soma o total
            total += produto.preco;
        });

        // Exibe o preço total
        totalPriceElement.textContent = total.toFixed(2);
    }
}

// Função para remover um item do carrinho
document.addEventListener('click', function(e) {
    if (e.target && e.target.classList.contains('remove-item')) {
        const index = e.target.getAttribute('data-index');
        let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
        
        // Remove o produto do carrinho
        carrinho.splice(index, 1);
        
        // Atualiza o carrinho no localStorage
        localStorage.setItem('carrinho', JSON.stringify(carrinho));
        
        // Atualiza a página
        atualizarCarrinho();
    }
});


// Atualiza o carrinho assim que a página carrega
window.onload = atualizarCarrinho;

// Atualiza a área do carrinho assim que a página carrega
window.onload = atualizarCarrinho;
