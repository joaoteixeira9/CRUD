document.addEventListener("DOMContentLoaded", function() {
    let dataSelecionada = document.getElementById("dataSelecionada");
    let alerta = document.getElementById("alertData");
    let formulario = document.querySelector("form");

    function verificarData() {
        let confirmarData = dataSelecionada.value;

        if (confirmarData == "") {
            alerta.innerHTML = "<i class='bi bi-exclamation-circle-fill'></i> Campo obrigatório!";
            alerta.classList.add("text-danger");
            dataSelecionada.focus();
            return false;
        } else {
            alerta.classList.remove("text-danger");
            alerta.style.display = 'none';
            return true;
        }
    }

    dataSelecionada.addEventListener("blur", verificarData);

    formulario.addEventListener("submit", function(event) {
        if (!verificarData()) {
            event.preventDefault();
        }
    });

    verificarData();
});