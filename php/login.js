document.getElementById("email").addEventListener("blur", function() {
    fnAdicionarMensagemDeErro("alertaEmail", "limpar");

    let emailObrigatorio = fnValidarCampoObrigatorio(this.value);
    if (!emailObrigatorio) {
        fnAdicionarMensagemDeErro("alertaEmail", "Campo obrigatório");
    } else {
        let emailValido = fnValidarMinimoDeCaracteres(5, this.value);
        if (!emailValido) {
            fnAdicionarMensagemDeErro("alertaEmail", "Mínimo 5 caracteres");
        }

        let emailFormatoValido = fnValidarEmail(this.value);
        if (!emailFormatoValido) {
            fnAdicionarMensagemDeErro("alertaEmail", "E-mail inválido");
        }

        if (!this.value.includes("@")) {
            fnAdicionarMensagemDeErro("alertaEmail", "O email deve conter '@'");
        }
    }
});

document.getElementById("senha").addEventListener("blur", function() {
    fnAdicionarMensagemDeErro("alertaSenha", "limpar");

    let senhaObrigatoria = fnValidarCampoObrigatorio(this.value);
    if (!senhaObrigatoria) {
        fnAdicionarMensagemDeErro("alertaSenha", "Campo obrigatório");
    } else {
        let senhaValida = fnValidarMinimoDeCaracteres(8, this.value); 
        if (!senhaValida) {
            fnAdicionarMensagemDeErro("alertaSenha", "Mínimo 8 caracteres");
        }

        let senhaFormatoValida = fnValidarSenhaComCaracteresEspeciais(this.value);
        if (!senhaFormatoValida) {
            fnAdicionarMensagemDeErro("alertaSenha", "A senha deve conter pelo menos um caractere especial");
        }
    }
});
