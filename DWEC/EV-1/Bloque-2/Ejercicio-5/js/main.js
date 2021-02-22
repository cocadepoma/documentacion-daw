'use strict';

document.addEventListener('DOMContentLoaded', function() {

    function checkNumber(number) {
        if (!isNaN(numero1) && numero1 != undefined) {
            numero1 = parseInt(numero1);
            return true;
        } else {
            return false;
        }
    }

    function primo(number) {
        var esPrimo = true;

        for (let i = 1; i <= number; i++) {
            if (i != 1 && i != number && number % i == 0) {
                esPrimo = false;
            }
        }
        return esPrimo;
    }



    var salir = false;

    while (!salir) {
        var numero1 = prompt("Introduce un número");
        salir = checkNumber(numero1);
    }
    if (primo(numero1)) {
        document.write("<h1>Es primo</h1>");
    } else {
        document.write("<h1>No es primo</h1>");
    }








});