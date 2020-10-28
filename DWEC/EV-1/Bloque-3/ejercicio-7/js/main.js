document.addEventListener('DOMContentLoaded', () => {


    const btn = document.getElementById('btn');
    const cajita = document.getElementById('cajita');

    btn.addEventListener('click', () => {

        let filas = document.getElementById('filas').value;
        let columnas = document.getElementById('columnas').value;
        let numFinal = 0;
        let i = 1;
        cajita.innerHTML = '';

        if (!isNaN(filas) && filas != '' && filas != undefined && !isNaN(columnas) && columnas != '' && columnas != undefined) {

            numFinal = parseInt(filas) * parseInt(columnas);

            let tabla = document.createElement('table');

            while (numFinal >= 1) {

                for (j = 0; j < filas; j++) {

                    let fila = document.createElement('tr');

                    for (k = 0; k < columnas; k++) {

                        let columna = document.createElement('td');
                        let texto = document.createTextNode(numFinal);

                        columna.appendChild(texto);
                        fila.appendChild(columna);
                        tabla.appendChild(fila);

                        numFinal--;

                    }
                }
                cajita.appendChild(tabla);
            }
        }


    });
});