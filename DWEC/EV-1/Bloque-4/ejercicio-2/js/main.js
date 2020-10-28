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

    let btn = document.querySelector('#submit');

    btn.addEventListener('click', () => {

        let input = document.querySelector('#numero').value;
        document.querySelector('.caja').innerHTML = '';

        if (esBuenNumero(input)) {
            let caja = document.querySelector('.caja');

            for (let i = 0; i < input; i++) {

                let span = document.createElement("span");
                let num = Math.floor(Math.random() * 5) + 1;

                switch (num) {

                    case 1:
                        span.classList.add('rojo');
                        break;
                    case 2:
                        span.classList.add('verde');
                        break;
                    case 3:
                        span.classList.add('amarillo');
                        break;
                    case 4:
                        span.classList.add('azul');
                        break;
                    default:
                        span.classList.add('negro');
                }

                let text = document.createTextNode("funciona, ");
                span.appendChild(text);
                caja.appendChild(span);
            }
        } else {
            alert("Error");
        }
    });
});