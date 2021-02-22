document.addEventListener('DOMContentLoaded', () => {


    const convert = document.getElementById('convert');
    const constant = 1.18; // 1€ = 1.18$
    const parrafoResultado = document.getElementById('resultado');
    const cajita = document.getElementById('cajita');

    convert.addEventListener('click', () => {

        // Borrar p de resultado
        document.getElementById('resultado').innerHTML = '';

        let cantidad = document.getElementById('cantidad').value;
        let convers = document.getElementById('convers').value;
        let convers2 = document.getElementById('convers2').value;

        if (cantidad != '' && cantidad != undefined && !isNaN(cantidad)) {

            let resultado = '';

            // Pasar dólares a euros
            if (convers === 'dollar') {
                if (convers2 === 'euro') {
                    resultado = ((cantidad / constant).toFixed(2) + "€");
                } else {
                    resultado = (cantidad + "$");
                }
            }

            // Pasar euros a dólares
            if (convers === 'euro') {
                if (convers2 === 'dollar') {
                    resultado = ((cantidad * constant).toFixed(2) + "$");
                } else {
                    resultado = (cantidad + "€");
                }
            }

            let text = document.createTextNode(resultado);
            parrafoResultado.appendChild(text);
            cajita.style.display = 'block';
        }

    });

});