document.addEventListener('DOMContentLoaded', () => {


    let btn = document.getElementById('btn');
    let inicio = 1;
    let fin = 31;

    btn.addEventListener('click', () => {

        while (inicio < fin) {

            for (let i = 0; i < inicio; i++) {
                document.write(inicio);
            }
            document.write("<br>");
            inicio++;

        }

    });


});