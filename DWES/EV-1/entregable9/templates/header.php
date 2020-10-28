<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            background-color: rgba(53, 50, 49, 0.1);
            font-family: Arial, Helvetica, sans-serif;
        }
        .contenedor {
            display: flex;
            justify-content: center;
            margin-top: 300px;
        }
        .error {
            padding: 2px 5px;
            background-color: rgba(252, 12, 12, 0.42);
            color: red;
        }
        form {
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }
        .formulario {
            padding: 20px;
            background: white;
            -webkit-box-shadow: 0px 2px 22px 1px rgba(0,0,0,0.46);
            -moz-box-shadow: 0px 2px 22px 1px rgba(0,0,0,0.46);
            box-shadow: 0px 2px 22px 1px rgba(0,0,0,0.46);
            max-width: 300px;
        }
        .btn {
            width: 60px;
            display: block;
            border-radius: 2px;
            padding: 6px 10px;
            border: none;
            background-color: rgba(92, 154, 50, 1);
            transition: 0.3s ease-in-out;
            color: white;
        }
        .btn:hover {
            background-color: rgba(114, 193, 62, 1);
        }
        .nombre {
            margin-bottom: 20px;
        } 

        .boton input{
            float: right;
        }
        .input {
            border-radius: 2px;
            border: 1px solid rgba(0, 0, 0, 0.25);
            padding: 5px;
            background-color: rgba(0, 0, 0, 0.1);
            transition: 0.3s ease-in-out;
        }
        .input:hover {
            background-color: rgba(0, 0, 0, 0.05);
        }
        .bold {
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>