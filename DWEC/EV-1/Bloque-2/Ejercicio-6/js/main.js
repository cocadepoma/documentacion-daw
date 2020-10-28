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


    var salir = false;
    var mensaje = "Error";

    while (!salir) {
        var numero1 = prompt("Introduce un número");
        salir = checkNumber(numero1);
    }


    if (numero1 >= 0 && numero1 < 5) {
        mensaje = "Insuficiente";
    } else if (numero1 >= 5 && numero1 <= 7) {
        mensaje = "Suficiente";
    } else if (numero1 >= 7 && numero1 <= 8) {
        mensaje = "Notable";
    } else if (numero1 >= 8 && numero1 <= 10) {
        mensaje = "Sobresaliente";
    } else {
        mensaje = "Matrícula de honor";
    }

    alert(mensaje);







});