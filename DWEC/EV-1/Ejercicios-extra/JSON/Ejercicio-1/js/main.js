document.addEventListener('DOMContentLoaded', () => {
    /* 
             let libros2 = [{
                    "id": 1,
                    "titulo": "Línea de fuego",
                    "autor": "Arturo Pérez-Reverte",
                    "editorial": "Alfaguara",
                    "total paginas": 688
                },
                {
                    "id": 2,
                    "titulo": "Las tinieblas y el alba",
                    "autor": "Ken Follet",
                    "editorial": "Anuvela",
                    "total paginas": 936
                },
                {
                    "id": 3,
                    "titulo": "La vida contada por un sapiens a un neandertal",
                    "autor": "Juan José Millás",
                    "editorial": "Alfaguara",
                    "total paginas": 224
                },
                {
                    "id": 4,
                    "titulo": "Emocionarte. La doble vida de los cuadros",
                    "autor": "Carlos del Amor",
                    "editorial": "Espasa",
                    "total paginas": 232
                },
                {
                    "id": 5,
                    "titulo": "Dime qué comes y te diré qué bacterias tienes",
                    "autor": "Blanca García-Orea Haro",
                    "editorial": "Grijalbo Ilustrados",
                    "total paginas": 272
                }


            ]; 

        document.querySelector('.json').textContent = JSON.stringify(libros2, undefined, 2);  
     */


    // Arrancar json-server -> json-server --watch libros.json
    let libros = [];

    fetch('http://localhost:3000/libros')
        .then((response) => response.json())
        .then(data => {
            libros = data;
            document.querySelector('.json').textContent = JSON.stringify(libros, undefined, 2);
        })
        .catch(error => console.log(error));


});