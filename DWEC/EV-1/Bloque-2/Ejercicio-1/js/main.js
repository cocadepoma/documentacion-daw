document.addEventListener('DOMContentLoaded', function() {

    var months = [
        'Enero',
        'Febrero',
        'Marzo',
        'Abril',
        'Mayo',
        'Junio',
        'Julio',
        'Agosto',
        'Septiembre',
        'Octubre',
        'Noviembre',
        'Diciembre'
    ];

    var salir = false;
    while (!salir) {
        var numero = prompt('Introduce un número del 1 al 12');
        if (numero >= 1 && numero <= 12) {
            salir = true;
        }
    }

    alert("Tu mes de la suerte es :" + months[numero - 1]);


});