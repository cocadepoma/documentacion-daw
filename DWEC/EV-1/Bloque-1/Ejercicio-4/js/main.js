document.addEventListener('DOMContentLoaded', function() {

    var nombre = prompt("Escribe tu nombre:");
    if (nombre != undefined && nombre != null && nombre.length > 2) {
        document.write(`<h1>Bienvenido a mi web ${nombre} </h1>`);
        console.log("Bienvenido a mi web " + nombre);
    } else {
        alert("Error al introducir el nombre");
        console.error("Eres un piratilla");
    }

});