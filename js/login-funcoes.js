function fnAdicionarMensagemDeErro(elementoId, mensagem) {
    const elemento = document.getElementById(elementoId);
    if (mensagem === "limpar") {
        elemento.innerText = "";
    } else {
        elemento.innerText = mensagem;
    }
}

function fnValidarMinimoDeCaracteres(minimo, valor) {
    return valor.length >= minimo;
}

function fnValidarCampoObrigatorio(valor) {
    return valor.trim() !== "";
}

function fnValidarEmail(email) {
    return /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/.test(email);
}

function fnValidarSenhaComCaracteresEspeciais(senha) {
    return /[!@#$%^&*(),.?":{}|<>]/.test(senha);
}