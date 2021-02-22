document.addEventListener('DOMContentLoaded', () => {

    let btn = document.getElementById('btn');

    btn.addEventListener('click', () => {

        let numero = document.getElementById('numero').valueAsNumber;

        if (numero > 0 && !isNaN(numero) && numero != undefined) {

            const win = window.open('about:blank', '_blank');
            win.document.write('<ul>');

            for (let i = 1; i <= 10; i++) {

                win.document.write('<li>');
                win.document.write(` ${numero} * ${i}  = ` + numero * i);
                win.document.write('</li>');

            }
            win.document.write('</ul>');
            win.open('index.html', '_blank');
        }
    });


});