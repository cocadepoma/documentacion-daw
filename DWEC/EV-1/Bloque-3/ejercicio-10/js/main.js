document.addEventListener('DOMContentLoaded', () => {

    const form_login = document.getElementById('form_login');

    form_login.addEventListener('submit', (e) => {

        e.preventDefault();

        const user = document.getElementById('user').value;
        const pass_one = document.getElementById('pass_one').value;
        const pass_two = document.getElementById('pass_two').value;

        if (user.length >= 3) {
            if (pass_one.length < 4 || pass_one == null || pass_one == undefined) {
                alert("Debes introducir una contraseña válida y de al menos 4 caracteres");
                form_login.reset();
            } else {
                if (pass_two === pass_one) {
                    alert(`Login correcto, bienvenido ${user}`);
                    form_login.reset();
                } else {
                    alert("Las contraseñas no son iguales");
                    form_login.reset();
                }
            }
        } else {
            alert("Debes introducir un usuario válido");
        }

    });

});