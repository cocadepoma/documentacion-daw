document.addEventListener('DOMContentLoaded', function() {

    var numeros = Array();
    var cnt = 0;
    var iteraciones = 4;
    var salir = false;

    /* Pedir numeros al usuario */
    while (!salir) {
        var numero = prompt("Introduce un número");
        if (!isNaN(numero) && numero != undefined) {
            numeros.push(numero);
            cnt++;
        }
        if (cnt == iteraciones) {
            salir = true;
        }
    }

    /* Pintar números en HTML */
    document.write("<h2>Los números que has elegido</h2>");
    document.write("<ul>");

    for (let numero in numeros) {
        document.write(`<li>${numeros[numero]}</li>`);
    }

    document.write("</ul>");



});