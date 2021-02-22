<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        h1 {
            padding: 15px;
            margin: 0;
        }
        form {
            padding: 20px;
        }
        .container {
            position: fixed;
            top: 100px;
            left: 100px;
            width: 300px;
            padding: 0px;
            border: 1px solid black;
            text-align: center;
            background-color: #eae4e2;
        }
        .letra {
            width: 25px;
        }
        .btn {
            padding: 10px;
            background-color: #caefa9;
            border: 1px solid #f0f0f0;
            font-weight: bold;
        }
        .input {
            width: 40px;
            font-size: 12px;
        }
        .bold {
            font-weight: bold;
        }
    </style>
</head>
<body>

    <?php

        include_once ('logica.php');

        if(isset($_POST['submit'])){

            if(isset($_POST['numero']) && $_POST['numero'] != ''){

                $pass = obtenerPassword($_POST['numero']);

                if(strlen($pass) > 0) {
                    echo "<h1> Tu contraseña: <span style='color: red;'>" .  $pass . "</span> </h1>";
                    echo "Longitud de la contraseña: <span class='bold'>" . strlen($pass) . "</span>";
                } else {
                    header('Location: http://localhost/trabajos/DAW/entregable4/index.php');
                }
            }
        }
    ?>

    <div class="container">
        <h1>Aleatory PWD</h1>
        <hr>
        <form method="post" action="index.php">
            <label for="numero">Introduce longitud contraseña <br> (Entre 8 y 12 caracteres)</label>
            <br><br>
            <input class="input" type="text" name="numero" placeholder="Número">
            <br><br>
            <input class="btn" type="submit" name="submit" value="Generar PWD">
        </form>
    </div>
    
</body>
</html>