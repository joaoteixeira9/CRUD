// Simulação de adicionar produto ao carrinho
function adicionarProdutoAoCarrinho(produto, quantidade) {
    // Aqui você estaria chamando o método real que adiciona o produto ao carrinho
    let carrinho = JSON.parse(localStorage.getItem('carrinho') || '[]');
    carrinho.push({ produto: produto, quantidade: quantidade, preco: produto.preco });
    localStorage.setItem('carrinho', JSON.stringify(carrinho));
}

// Teste para verificar se o produto foi adicionado corretamente
function testarAdicaoDeProduto() {
    // Produto de teste
    let produto = { nome: 'Barbeador', preco: 25.99 };
    
    // Adicionar produto ao carrinho
    adicionarProdutoAoCarrinho(produto, 1);

    // Recuperar o carrinho e validar
    let carrinho = JSON.parse(localStorage.getItem('carrinho'));

    // Verifique se o produto foi adicionado
    if (carrinho && carrinho.length > 0) {
        console.log('Produto adicionado ao carrinho: ', carrinho[0]);
        
        // Verifique o nome e o preço do produto
        if (carrinho[0].produto.nome === produto.nome && carrinho[0].preco === produto.preco) {
            console.log('Teste de adição de produto no carrinho: PASSEI');
        } else {
            console.error('Erro: Produto ou preço incorretos.');
        }
    } else {
        console.error('Erro: Produto não foi adicionado ao carrinho.');
    }
}

// Rodar o teste
testarAdicaoDeProduto();
