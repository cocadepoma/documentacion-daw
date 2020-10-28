document.addEventListener('DOMContentLoaded', () => {

    'use strict'

    document.addEventListener('keydown', (e) => {

        let tecla = e.key;

        if (tecla == 'Shift' || tecla == 'Control' || tecla == 'Alt') {
            console.log(`Le has dado a la tecla ${tecla.toUpperCase()}`);
        } else {
            console.log("A saber que has tocado");
        }

    });

});