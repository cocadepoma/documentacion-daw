document.addEventListener('DOMContentLoaded', () => {

    'use strict'

    let caja = document.querySelector('.caja');
    let img = document.createElement('img');

    caja.addEventListener('mouseover', () => {

        img.setAttribute('src', 'img/pajaro1.gif');
        caja.appendChild(img);
    });
    caja.addEventListener('mouseout', () => {

        img.setAttribute('src', 'img/pajaro2.gif');
        caja.appendChild(img);
    });
});