// Adiciona os produtos ao carrinho e armazena no localStorage
document.querySelectorAll('.add-to-cart').forEach(button => {
    button.addEventListener('click', function () {
        const produto = {
            id: this.getAttribute('data-id'),
            nome: this.getAttribute('data-nome'),
            preco: parseFloat(this.getAttribute('data-preco')),
            quantidade: parseInt(this.getAttribute('data-quantidade')), // Adiciona a quantidade
            descricao: this.getAttribute('data-descricao'), // Adiciona a descrição
        };

        // Recupera o carrinho do localStorage (caso não exista, cria um array vazio)
        let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
        
        // Adiciona o produto ao carrinho
        carrinho.push(produto);

        // Armazena o carrinho atualizado no localStorage
        localStorage.setItem('carrinho', JSON.stringify(carrinho));

        console.log(carrinho); // Verifica se o produto foi adicionado corretamente

        // Atualiza a exibição do carrinho
        atualizarCarrinho();
    });
});

// Função que atualiza a exibição do carrinho
function atualizarCarrinho() {
    const carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
    const cartItems = document.getElementById('cart-items');
    const totalPriceElement = document.getElementById('total-price');

    // Limpa os itens exibidos
    cartItems.innerHTML = '';

    if (carrinho.length === 0) {
        cartItems.innerHTML = '<p>Seu carrinho está vazio.</p>';
    } else {
        let total = 0;

        // Exibe cada item do carrinho
        carrinho.forEach((produto, index) => {
            const item = document.createElement('div');
            item.classList.add('cart-item');
            item.innerHTML = `
                <p>${produto.nome} - R$ ${produto.preco.toFixed(2)}</p>
                <p>Quantidade: ${produto.quantidade}</p> <!-- Exibe a quantidade -->
                <p>Descrição: ${produto.descricao}</p> <!-- Exibe a descrição -->
                <button class="remove-item" data-index="${index}">Remover</button>
            `;
            cartItems.appendChild(item);

            total += produto.preco * produto.quantidade; // Calcula o total com base na quantidade
        });

        // Exibe o preço total no carrinho
        totalPriceElement.textContent = total.toFixed(2);
    }
}

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

// Chama a função para atualizar o carrinho quando a página carregar
window.onload = atualizarCarrinho;
