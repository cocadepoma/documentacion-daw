document.addEventListener('DOMContentLoaded', () => {


    const add = document.getElementById('add');
    const erase = document.getElementById('erase');
    const length = document.getElementById('length');

    let array = [];
    let texto = '';
    let radioStart = '';

    add.addEventListener('click', () => {

        texto = document.getElementById('texto').value;
        radioStart = document.getElementById('start').checked;

        if (esTexto(texto)) {
            if (radioStart) {
                array.unshift(texto);
            } else {
                array.push(texto);
            }
        }

        document.getElementById('texto').value = '';
        alert(array);

    });

    erase.addEventListener('click', () => {
        if (array.length > 0) {
            radioStart = document.getElementById('start').checked;

            if (radioStart) {
                array.shift();
            } else {
                array.pop();
            }

            alert(array);

        }

        document.getElementById('texto').value = '';

    });

    length.addEventListener('click', () => {

        alert("Longitud del array: " + array.length)
        document.getElementById('texto').value = '';
    });

    function esTexto(texto) {
        if (texto.length > 0 && texto != null && texto != undefined) {
            return true;
        } else {
            return false;
        }
    }
});