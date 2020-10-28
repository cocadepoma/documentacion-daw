'use strict';

document.addEventListener('DOMContentLoaded', function() {

    function buscaMayor() {
        var mayor = arguments[0];
        for (let i = 0; i < arguments.length; i++) {
            if (mayor < arguments[i]) {
                mayor = arguments[i];
            }
        }
        return mayor;
    }


    var salir = false;


    while (!salir) {
        var numero1 = prompt("Introduce número 1");
        var numero2 = prompt("Introduce número 2");
        var numero3 = prompt("Introduce número 3");

        if (!isNaN(numero1) && numero1 != undefined && !isNaN(numero2) && numero2 != undefined && !isNaN(numero3) && numero3 != undefined) {
            numero1 = parseInt(numero1);
            numero2 = parseInt(numero2);
            numero3 = parseInt(numero3);
            salir = true;
        }
    }

    let numMayor = buscaMayor(numero1, numero2, numero3);


    var div = document.createElement('div');
    var p = document.createElement('p');
    var text = document.createTextNode(`El numero mayor es: ${numMayor}`);

    p.appendChild(text);
    div.appendChild(p);
    document.body.appendChild(div);


});