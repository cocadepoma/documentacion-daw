document.addEventListener('DOMContentLoaded', () => {

    let caja = document.querySelector('.caja');


    setTimeout(() => {
        fetch('https://reqres.in/api/unknown')
            .then(response => response.json())
            .then(colours => {

                let colorcetes = colours.data.map(color => {
                    return { "id": color.id, "nombre": color.name, "codigo": color.color }
                });
                caja.innerHTML = "";
                for (let i in colorcetes) {
                    let div = document.createElement('div');
                    let span = document.createElement('span');
                    span.append(`ID: ${colorcetes[i].id}, Nombre: ${colorcetes[i].nombre}, Código: ${colorcetes[i].codigo}`);
                    span.style.backgroundColor = colorcetes[i].codigo;
                    span.classList.add('black');
                    caja.append(span);
                    caja.append(div);
                }
            })
            .catch(error => console.log(error));
    }, 3000);















});