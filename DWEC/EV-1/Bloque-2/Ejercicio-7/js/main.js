'use strict';

document.addEventListener('DOMContentLoaded', function() {

    var mensaje = '';

    do {
        var poppup = prompt("Introduce un texto");
        if (poppup != null) {
            mensaje += poppup + ", ";
        }

    }
    while (poppup != null);

    document.write("<h2>Tu mensaje: " + mensaje + "</h2>");

});