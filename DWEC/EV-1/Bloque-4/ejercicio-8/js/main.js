document.addEventListener('DOMContentLoaded', () => {

    'use strict'

    let btn = document.querySelector('.creador');
    localStorage.setItem("contador", 1);

    btn.addEventListener('click', () => {

        let caja = document.querySelector('.caja');
        let numero = localStorage.getItem("contador");
        let texto = document.createTextNode(`${numero}`);
        let p = document.createElement('p');
        let cajita = document.createElement('div');


        cajita.classList.add('cajita');
        p.appendChild(texto);
        cajita.appendChild(p);
        caja.appendChild(cajita);

        numero++;
        localStorage.setItem("contador", numero);

    });
});