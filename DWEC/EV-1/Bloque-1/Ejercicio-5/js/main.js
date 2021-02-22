document.addEventListener('DOMContentLoaded', function() {

    var salir = false;
    var numero_1;
    var numero_2;

    while (!salir) {

        numero_1 = prompt("Introduce un número", 0);
        numero_2 = prompt("Introduce otro número", 0);

        if (!isNaN(numero_1) && numero_1 != undefined && !isNaN(numero_2) && numero_2 != undefined) {
            numero_1 = parseInt(numero_1);
            numero_2 = parseInt(numero_2);
            document.write(`${numero_1} + ${numero_2} = ${numero_1+numero_2}`);
            console.log(`${numero_1} + ${numero_2} = ${numero_1+numero_2}`);
            salir = true;

        } else alert("No me seas troll!");
    }
});