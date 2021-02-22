document.addEventListener('DOMContentLoaded', () => {

    'use strict'
    let body = document.querySelector('body');
    let caja = document.querySelector('.caja');
    let img = document.createElement('img');
    let num = 1;



    window.setInterval(() => {

        document.querySelector('.caja').innerHTML = '';
        caja.classList.add('blanco');
        img.setAttribute('src', `img/banner${num}.jpg`);
        caja.appendChild(img);

        if (num + 1 <= 3) {
            num++;
        } else {
            num = 1;
        }

    }, 3000);








});