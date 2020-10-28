document.addEventListener('DOMContentLoaded', function() {
    var numero = prompt("Introduce un número");

    if (!isNaN(numero) && numero != undefined) {
        numero = parseInt(numero);
        if (numero % 2 == 0) {
            alert("El número es par");
        } else {
            alert("Es impar");
        }
    }


});