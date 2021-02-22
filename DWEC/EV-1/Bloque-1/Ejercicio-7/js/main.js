document.addEventListener('DOMContentLoaded', function() {

    var edad = prompt("Introduce tu edad");

    if (!isNaN(edad) && edad != undefined) {
        edad = parseInt(edad);

        if (edad >= 18) {
            alert("Eres mayor de edad, paga la coca");
        } else {
            alert("Lo siento, necesitas la mayoría de edad para acceder al website");
        }
    } else {
        alert("Introduce caracteres númericos");
    }

});