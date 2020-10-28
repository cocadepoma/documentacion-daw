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

    let form = document.querySelector('.formulario');

    form.addEventListener('submit', (e) => {
        e.preventDefault();

        document.querySelector('.caja').innerHTML = "";
        document.querySelector('.resultado').innerHTML = "";

        const caja = document.querySelector('.caja');
        const resultado = document.querySelector('.resultado');

        let nCaras = Number(document.querySelector('#caras').value);
        let nDados = Number(document.querySelector('#ndados').value);
        let puntuacion = 0;
        let puntuacionStr = '';


        for (let i = 0; i < nDados; i++) {

            let num = Math.floor(Math.random() * nCaras) + 1;
            let text = document.createTextNode(num);
            let p = document.createElement('p');
            let cajita = document.createElement('div');
            cajita.classList.add('cajita');

            let textFuera = document.createTextNode(`Dado número : ${i+1}`);
            let span = document.createElement('span');
            puntuacion += num;

            if (i + 1 == nDados) {
                puntuacionStr += num;
            } else {
                puntuacionStr += num + ', ';
            }

            span.appendChild(textFuera);
            p.appendChild(text);
            cajita.appendChild(p);
            caja.appendChild(span);
            caja.appendChild(cajita);

        }

        let max = nCaras * nDados;
        let tirada = document.createTextNode('Tirada máxima');
        let avisoColor = document.createElement('p');

        if (puntuacion > max * 0.85) {
            tirada = document.createTextNode('Tirada máxima');
            avisoColor.classList.add('verde');
            avisoColor.appendChild(tirada);
        }
        if (puntuacion < max * 0.15) {
            tirada = document.createTextNode('Pifia');
            avisoColor.classList.add('rojo');
            avisoColor.appendChild(tirada);
        }

        let h2 = document.createElement('h2');
        let mensaje = document.createTextNode(`Puntuacion: ${puntuacion} (${puntuacionStr})`);
        h2.appendChild(mensaje);
        resultado.appendChild(h2);
        resultado.appendChild(avisoColor);

    });
});