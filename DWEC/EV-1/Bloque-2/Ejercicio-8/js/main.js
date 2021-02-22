'use strict';

document.addEventListener('DOMContentLoaded', function() {

    var numeros = new Array();
    var suma = 0;
    do {
        var numero = prompt("Introduce un numero");

        if (!isNaN(numero) && numero != undefined && numero != null) {
            numeros.push(parseInt(numero));
        } else if (isNaN(numero) || numero == undefined && numero != null) {
            alert("El programa sólo acepta números");
        }

    }
    while (numero != null);

    for (let i in numeros) {
        suma += numeros[i];
    }

    document.write("<h1>La suma total es: " + suma + "</h1>");

});