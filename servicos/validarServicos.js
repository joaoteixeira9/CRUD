document.getElementById("s-nome").addEventListener("blur", function(){
    let nome = this.value
    let alerta = document.getElementById("alertS-nome")

    if (!nome){
        alerta.innerHTML = "campo obrigatorio"
    }else {
        alerta.style.display = "none"
    }
})
document.getElementById("s-descricao").addEventListener("blur", function(){
    let descricao = this.value
    let alerta = document.getElementById("alertS-descricao")

    if(!descricao){
        alerta.innerHTML = "Informação nescessária"
    }
})