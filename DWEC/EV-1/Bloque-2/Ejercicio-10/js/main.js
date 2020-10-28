'use strict';

document.addEventListener('DOMContentLoaded', function() {

    var aleatorios = new Array();
    var cnt = 0;

    function buscarNumero(numero) {
        let encontrado = false;
        for (let i in aleatorios) {
            if (aleatorios[i] == numero) {
                encontrado = true;
            }
        }
        return encontrado;
    }

    while (cnt < 3) {

        let numero = Math.floor(Math.random() * 99) + 1;
        let encontrado = buscarNumero(numero);

        if (encontrado == false) {
            aleatorios.push(numero);
            cnt++;
        }
    }

    document.write("<h1> Tus números aleatorios </h1>");
    document.write("<ul>");

    for (let i in aleatorios) {
        document.write("<li>");
        document.write(aleatorios[i]);
        document.write("</li>");
    }

    document.write("</ul>");

    console.log(aleatorios);

});