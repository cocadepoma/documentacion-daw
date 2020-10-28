<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ej2</title>
    <style>
        .gris, td, table {
            border: 1px solid black;
            font-size: 30px;
        }
        .gris{
            background-color: grey;         
        }
        table {
            border-collapse: collapse;
        } 
    </style>
</head>

<body>
<?php
    $grey = true;   
    $numero = 1;

    echo "<table>";

    while($numero <= 100) {

        if($grey){
            echo "<tr class='gris'>";
            $grey = !$grey;
        } else {
            echo "<tr>";
            $grey = !$grey;
        }
        for($i = 0 ; $i < 10 ; $i++) {
            echo "<td>";
            echo $numero;
            echo "</td>";
            $numero++;
        }
        echo "</tr>";
    }
    echo "</table>";
?>
</body>
</html>