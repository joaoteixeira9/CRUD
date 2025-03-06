document.getElementById("nome").addEventListener("blur", function(){
    let nome = this.value;
    let alerta = document.getElementById("alertNome");

    if(!nome){
        alerta.innerHTML = "<i class='bi bi-exclamation-circle-fill'></i> Campo obrigatório!";
        alerta.classList.add("text-danger");
        this.focus();
    }
    else if(nome.length < 3){
        alerta.innerHTML = "<i class='bi bi-exclamation-circle-fill'></i> Obrigatório ter 3 caracteres!";
        alerta.classList.add("text-danger");
        this.focus();
    }
    else{
        alerta.style.display = "none";
        alerta.classList.remove("text-danger");
    }
})

document.getElementById("telefone").addEventListener("blur", function(){
    let telefone = this.value;
    let alerta = document.getElementById("alertTel");

    if(!telefone){
        alerta.innerHTML = alerta.innerHTML = "<i class='bi bi-exclamation-circle-fill'></i> Campo obrigatório!";
        alerta.classList.add("text-danger");
        this.focus();
    }
    else if(telefone.length < 11){
        alerta.innerHTML = "<i class='bi bi-exclamation-circle-fill'></i> Número de telefone inválido!";
        alerta.classList.add("text-danger");
        this.focus();
    }
    else{
        alerta.style.display = "none";
        alerta.classList.remove("text-danger");
    }
})
document.getElementById("telefone").addEventListener("input", function(event) {
    let telefone = event.target.value.replace(/\D/g, ""); // Remove caracteres não numéricos
    event.target.value = telefone.replace(/(\d{2})(\d{5})(\d{4})/, "($1) $2-$3"); // Aplica a máscara
});

document.getElementById("email").addEventListener("blur", function(){
    let email = this.value;
    let alerta = document.getElementById("alertEmail");

    if(!email){
        alerta.innerHTML = "<i class='bi bi-exclamation-circle-fill'></i> Campo obrigatório!";
        alerta.classList.add("text-danger");
        this.focus();
    }
    else{
        alerta.style.display = "none";
        alerta.classList.remove("text-danger");
    }
})

document.getElementById("senha").addEventListener("blur", function(){
    let senha = this.value;
    let alerta = document.getElementById("alertSenha");

    if(!senha){
        alerta.innerHTML = "<i class='bi bi-exclamation-circle-fill'></i> Campo obrigatório!";
        alerta.classList.add("text-danger");
        this.focus();
    }
    else if(senha.length < 8){
        alerta.innerHTML = "<i class='bi bi-exclamation-circle-fill'></i> Obrigatório ter no minímo 8 caracteres!";
        alerta.classList.add("text-danger");
        this.focus();
    }
    else{
        alerta.style.display = "none";
        alerta.classList.remove("text-danger");
    }
})

document.getElementById("confirmarSenha").addEventListener("blur", function(){
    let confirmarSenha = this.value;
    let senha = document.getElementById("senha").value;
    let alerta = document.getElementById("alertConfirmarSenha")

    if (!confirmarSenha) {
        alerta.innerHTML = "<i class='bi bi-exclamation-circle-fill'></i> Campo obrigatório!";
        alerta.classList.add("text-danger");
        this.focus();
    }
    else if (confirmarSenha !== senha) {
        alerta.innerHTML = "<i class='bi bi-exclamation-circle-fill'></i> As senhas não coincidem!";
        alerta.classList.add("text-danger");
    }
    else {
        alerta.style.display = "none";
        alerta.classList.remove("text-danger");
    }
})