document.addEventListener('DOMContentLoaded', () => {

    function esNumeroEdad(numero) {
        if (numero > 0 && numero != undefined && !isNaN(numero)) {
            return true;
        }
    }

    function contieneTexto(nombre) {
        if (nombre.length >= 2 && nombre != undefined) {
            return true;
        }
    }


    let btn = document.getElementById('btn');

    btn.addEventListener('click', () => {

        let array = [];

        let nombre1 = document.getElementById('nombre1').value;
        let nombre2 = document.getElementById('nombre2').value;
        let nombre3 = document.getElementById('nombre3').value;

        let edad1 = document.getElementById('edad1').valueAsNumber;
        let edad2 = document.getElementById('edad2').valueAsNumber;
        let edad3 = document.getElementById('edad3').valueAsNumber;


        if (contieneTexto(nombre1) && contieneTexto(nombre2) && contieneTexto(nombre3)) {
            if (esNumeroEdad(edad1) && esNumeroEdad(edad2) && esNumeroEdad(edad3)) {
                array = [{
                        'nombre': nombre1,
                        'edad': edad1
                    },
                    {
                        'nombre': nombre2,
                        'edad': edad2
                    },
                    {
                        'nombre': nombre3,
                        'edad': edad3
                    }
                ];

                let nombreMayor = array[0].nombre;
                let edadMayor = array[0].edad;

                for (let i = 0; i < 3; i++) {
                    if (edadMayor < array[i].edad) {
                        nombreMayor = array[i].nombre;
                        edadMayor = array[i].edad;
                    }
                }

                alert(`El más viejo es ${nombreMayor} y tiene ${edadMayor} años`);
            } else {
                alert('Insertar una edad válida');
            }
        } else {
            alert('Debes insertar nombres con al menos 2 caracteres');
        }
    });
});