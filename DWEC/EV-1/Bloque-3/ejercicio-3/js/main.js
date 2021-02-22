document.addEventListener('DOMContentLoaded', () => {

    let btn = document.getElementById('btn');

    btn.addEventListener('click', () => {

        let caja = document.getElementById('caja');
        const finalTabla = 10;
        var tabla = document.createElement('table');
        var i = 0;
        var j = 0;

        // Cada iteración de "i" es una fila --> Crear TR
        while (i <= finalTabla) {

            var tr = document.createElement('tr');

            // Cada iteración de "j" es una columna --> Crear TD y el texto dependiendo de la posición
            while (j <= 10) {
                var td = document.createElement('td');

                // Primera casilla [0,0]
                if (j == 0 && i == 0) {
                    let text = document.createTextNode('( x )');
                    td.classList.add('rojo', 'bold');
                    td.appendChild(text);
                    j++;
                }

                // Primera fila, casilla > 0
                else if (i == 0 && j > 0) {
                    let text = document.createTextNode(j);
                    td.classList.add('verde', 'bold');
                    td.appendChild(text);
                    j++;
                }

                // Primera casilla, fila > 0
                else if (j == 0 && i > 0) {
                    let text = document.createTextNode(i);
                    td.classList.add('verde', 'bold');
                    td.appendChild(text);
                    j++;
                }

                // No es ni casilla 0 ni fila 0
                else if (i > 0 && j > 0) {
                    let text = document.createTextNode(i * j);
                    td.appendChild(text);
                    j++;
                }

                tr.appendChild(td);
                tabla.appendChild(tr);

            }
            i++;
            j = 0;
            caja.appendChild(tabla);
        }









    });


});