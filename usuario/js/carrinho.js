// Remover um item do carrinho
document.addEventListener('click', function (e) {
    if (e.target && e.target.classList.contains('remove-item')) {
        const index = e.target.getAttribute('data-index');
        let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];

        // Remove o item selecionado
        carrinho.splice(index, 1);

        // Atualiza o carrinho no localStorage
        localStorage.setItem('carrinho', JSON.stringify(carrinho));

        // Atualiza a exibição do carrinho
        atualizarCarrinho();
    }
});

// Função para atualizar a exibição do carrinho
function atualizarCarrinho() {
    const carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
    const cartItems = document.getElementById('cart-items');
    const totalPriceElement = document.getElementById('total-price');

    // Limpa os itens exibidos
    cartItems.innerHTML = '';

    if (carrinho.length === 0) {
        cartItems.innerHTML = '<p>Seu carrinho está vazio.</p>';
        totalPriceElement.textContent = 'R$ 0.00';  // Exibe zero quando o carrinho estiver vazio
    } else {
        let total = 0;

        // Exibe cada item do carrinho
        carrinho.forEach((produto, index) => {
            const item = document.createElement('div');
            item.classList.add('col-md-4', 'd-flex', 'align-items-stretch', 'mb-4');
            item.innerHTML = `
                <div class="card shadow-sm">
                    <img src="${produto.imagem}" alt="${produto.nome}" class="card-img-top" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">${produto.nome}</h5>
                        <p class="card-text">R$ ${produto.preco.toFixed(2)}</p>
                        <p>Unidade: ${produto.unidade}</p>
                        <div class="descricao" style="height: 70px; overflow-y: auto;">
                            <p>${produto.descricao}</p>
                        </div>
                        <button class="remove-item btn btn-danger btn-sm" data-index="${index}">Remover</button>
                    </div>
                </div>
            `;
            cartItems.appendChild(item);

            // Calcula o total com base no preço e unidade
            total += produto.preco * produto.unidade;
        });

        // Exibe o preço total no carrinho
        totalPriceElement.textContent = `R$ ${total.toFixed(2)}`;
    }
}

// Atualiza o carrinho na página quando a página for carregada
window.onload = atualizarCarrinho;
