document.addEventListener('DOMContentLoaded', () => {


    'use strict'

    function esBuenNumero(numero) {
        let bueno = false;

        if (!isNaN(numero) && numero != '' && numero != 'undefined') {
            if (numero > 0 && numero < 101) {
                bueno = true;
            }
        }
        return bueno;
    }


    let correcto = false;
    let numero = 0;

    while (!correcto) {

        numero = prompt("Introduce un número");

        if (esBuenNumero(numero)) {
            correcto = true;
        }
    }

    if (correcto) {

        var caja = document.querySelector('.caja');
        let p = document.createElement("p");

        for (let i = 0; i < numero; i++) {
            let text = document.createTextNode("funciona, ");
            p.appendChild(text);
        }
        caja.appendChild(p);
    }



});