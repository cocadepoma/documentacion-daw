'use strict';

document.addEventListener('DOMContentLoaded', function() {

    var salir = false;
    var mayor = 0;

    while (!salir) {
        var numero1 = prompt("Introduce un número");
        var numero2 = prompt("Introduce otro número");

        if (!isNaN(numero1) && numero1 != undefined && !isNaN(numero2) && numero2 != undefined) {
            numero1 = parseInt(numero1);
            numero2 - parseInt(numero2);
            salir = true;
        }
    }

    if (numero1 > numero2) {
        mayor = numero1;
    } else {
        mayor = numero2;
    }

    var div = document.createElement('div');
    var p = document.createElement('p');
    var text = document.createTextNode(`El numero mayor es: ${mayor}`);

    p.appendChild(text);
    div.appendChild(p);
    document.body.appendChild(div);


});