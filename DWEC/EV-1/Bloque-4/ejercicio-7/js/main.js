document.addEventListener('DOMContentLoaded', () => {

    'use strict'
    let body = document.querySelector('body');
    let caja = document.querySelector('.caja');
    let caja2 = document.createElement('div');
    let img = document.createElement('img');
    localStorage.setItem('cnt', 1);

    caja.addEventListener('click', () => {

        let num = Number(localStorage.getItem('cnt'));

        //let num = (Math.floor(Math.random() * 3) + 1);

        img.setAttribute('src', `img/banner${num}.jpg`);
        caja2.appendChild(img);
        body.appendChild(caja2);

        if (num + 1 <= 3) {
            num++;
            localStorage.setItem('cnt', num);
        } else {

            localStorage.setItem('cnt', 1);
        }

    });

});