function validarFormularioProdutos() {
    var produto = document.getElementById('p-nome').value;
    var descricao = document.getElementById('p-descricao').value;
    var preco = document.getElementById('p-preco').value;

    if (produto === "" || descricao === "" || preco === "") {
        document.getElementById("s-alert").innerHTML = "<i class='bi bi-exclamation-circle-fill'></i> Todos os campos devem ser preenchidos!";
        return false;
    }
    return true;
}

function validarFormularioServicos() {
    var produto = document.getElementById('s-nome').value;
    var descricao = document.getElementById('s-descricao').value;
    var preco = document.getElementById('s-preco').value;
    var categoria = document.getElementById('s-categoria').value;

    if (produto === "" || descricao === "" || preco === "" || categoria === "") {
        document.getElementById("s-alert").innerHTML = "<i class='bi bi-exclamation-circle-fill'></i> Todos os campos devem ser preenchidos!";
        return false;
    }

    preco = preco.replace(/[^\d,-]/g, '');
    if (!isNaN(preco)){
        document.getElementById("s-alert").innerHTML = "<i class='bi bi-exclamation-circle-fill'></i> Por favor, insira apenas números no campo de <strong>preço</strong>.";
        return false;
    }
    return true;
}

function formatarPreco() {
    var precoInput = document.getElementById('s-preco');
    var preco = precoInput.value;

    preco = preco.replace(/\D/g, "");
    if (preco.length > 2) {
        preco = preco.slice(0, preco.length - 2) + '.' + preco.slice(preco.length - 2);
    } else {
        preco = '0.' + preco.padStart(2, '0');
    }    
    preco = parseFloat(preco).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
    precoInput.value = preco;
}