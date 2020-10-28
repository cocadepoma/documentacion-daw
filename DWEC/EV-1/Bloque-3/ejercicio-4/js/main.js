document.addEventListener('DOMContentLoaded', () => {


    let btn = document.getElementById('btn');
    let inicio = 1;
    let i = 1;
    let fin = 51;

    btn.addEventListener('click', () => {

        while (inicio < fin) {

            while (i <= inicio) {
                document.write(i);
                i++;
            }
            if (i > inicio) {
                i = 1;
                document.write("<br>");
            }
            inicio++;
        }
    });
});