document.addEventListener('DOMContentLoaded', function() {

    var btn = document.getElementById('btn');

    btn.addEventListener('click', () => {

        var textoInput = document.getElementById('texto').value;
        var textInputReverse = '';

        for (let i = textoInput.length - 1; i >= 0; i--) {
            textInputReverse += textoInput[i];
        }

        alert(textInputReverse);


    });



});