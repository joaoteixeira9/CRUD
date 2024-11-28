let count = 1;
document.getElementById("radio1").checked = true;

setInterval(function() {
    nextImage();
}, 3000);

function nextImage() {
    count++;
    if(count > 3) {  // Corrigido para 3, pois há 3 imagens
        count = 1;
    }

    document.getElementById("radio" + count).checked = true;
}
