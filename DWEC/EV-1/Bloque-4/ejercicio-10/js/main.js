document.addEventListener('DOMContentLoaded', () => {

    'use strict'
    let enlacesPrueba = 0;



    let parrafos = document.querySelectorAll('p');
    console.log(parrafos.length);

    let enlaces = document.querySelectorAll('a');
    console.log(enlaces.length);

    console.log(enlaces[(enlaces.length - 2)].pathname);

    console.log(enlaces[enlaces.length - 1].textContent);

    for (let i = 0; i < enlaces.length; i++) {

        if (enlaces[i].href == 'http://prueba/') {
            enlacesPrueba++;
        }
    }
    console.log(enlacesPrueba);

    let parrafos2 = document.querySelectorAll('p')[2].childNodes;
    let cntParrafos2 = 0;

    for (let i = 0; i < parrafos2.length; i++) {
        if (parrafos2[i].nodeName == 'A') {
            cntParrafos2++;
        }
    }

    console.log(cntParrafos2);



    let cntStrong = 0;

    for (let j = 0; j < parrafos.length; j++) {

        for (let i = 0; i < parrafos[j].childNodes.length; i++) {

            if (parrafos[j].childNodes[i].nodeName == 'STRONG') {
                cntStrong++;
            }
        }
    }
    console.log(cntStrong);


    let body = document.querySelector('body');
    let descripcionImg = '';
    let alineacionImg = '';
    for (let i = 0; i < body.childNodes.length; i++) {
        if (body.childNodes[i].nodeName == 'IMG') {
            descripcionImg = body.childNodes[i].alt;
            alineacionImg = body.childNodes[i].align;
        }

    }
    console.log(descripcionImg);
    console.log(alineacionImg);



});