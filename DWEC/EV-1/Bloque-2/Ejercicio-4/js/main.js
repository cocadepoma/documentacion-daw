'use strict';

document.addEventListener('DOMContentLoaded', function() {

    var salir = false;
    var aviso;

    while (!salir) {
        var numero1 = prompt("Introduce un número");

        if (!isNaN(numero1) && numero1 != undefined) {
            numero1 = parseInt(numero1);
            salir = true;
        }
    }

    if (numero1 > 1) {
        if (numero1 % 2 == 0) {
            aviso = 2;
        } else if (numero1 % 3 == 0) {
            aviso = 3;
        } else if (numero1 % 5 == 0) {
            aviso = 5;
        } else if (numero1 % 7 == 0) {
            aviso = 7;
        }
    } else {
        alert("Troll");
    }

    if (aviso) {
        alert("Es divisible por : " + aviso);
    }




});