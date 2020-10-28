document.addEventListener('DOMContentLoaded', function() {
    var nombre = prompt("Escribe tu nombre:");
    if (nombre != undefined && nombre != null && nombre.length > 2) {
        document.write = ("Bienvenido " + nombre);
        console.log("Bienvenido " + nombre);
    } else {
        alert("Error al introducir el nombre");
        console.error("Eres un piratilla");
    }
});