document.getElementById('senha').addEventListener('input', function(){
    var senha = this;
    var mensagemErro = document.getElementById('senhaHelp');

    if (senha.value.length < 8){
        senha.setCustomValidity("Por favor, insira no mínimo 8 caracteres.");

    }else {
        senha.setCustomValidity("");
        mensagemErro.textContent = "";
    }
});

function mascaraTelefone(event) {
    var telefone = event.target.value;
    telefone = telefone.replace(/\D/g, "");
    if (telefone.length <= 2) {
        telefone = telefone.replace(/^(\d{2})(\d*)$/, "($1) $2");
    } else if (telefone.length <= 6) {
        telefone = telefone.replace(/^(\d{2})(\d{5})(\d*)$/, "($1) $2-$3");
    } else {
        telefone = telefone.replace(/^(\d{2})(\d{5})(\d{4})$/, "($1) $2-$3");
    }
    event.target.value = telefone;
}
window.onload = function() {
    document.getElementById('telefone').addEventListener('input', mascaraTelefone);
}