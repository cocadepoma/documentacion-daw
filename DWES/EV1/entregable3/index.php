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
    </style>
</head>
<body>

    <div class="container">
        <h1>Validator DNI</h1>
        <hr>
        <form method="post" action="logica.php">
            <label for="dni">DNI:</label>
            <input type="text" name="dni" placeholder="Introduce número DNI">
            <br><br>
            <input class="btn" type="submit" name="submit" value="Comprobar">
        </form>
    </div>
    
</body>
</html>