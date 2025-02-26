function validarFormularioServicos() {
    var servico = document.getElementById('s-nome').value;
    var descricao = document.getElementsById('s-descricao').value;
    var preco = document.getElementsById('s-preco').value;
    var categoria = document.getElementsById('s-categoria').value;

    if (servico === "" || descricao === "" || preco === "" || categoria === "") {
        document.getElementById("s-alert").innerHTML = "<i class='bi bi-exclamation-circle-fill'></i> Todos os campos devem ser preenchidos!";
        return false;
    }
    return true;
}

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
