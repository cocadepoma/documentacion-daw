document.addEventListener('DOMContentLoaded', () => {

    const fecha = new Date();
    const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    const spanishDate = "Hoy es " + fecha.toLocaleDateString('es-ES', options);

    const p = document.createElement('p');
    const text = document.createTextNode(spanishDate);
    p.appendChild(text);
    document.getElementById('caja').appendChild(p);

});