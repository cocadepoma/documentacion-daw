<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ej1</title>
</head>
<body>
<?php
    $tamanioVec = 10;
    $numMin = 1;
    $numMax = 100;
    $vec = array();
    $suma = 0;

    for($i = 0; $i < $tamanioVec; $i++) {
        $vec[] = random_int($numMin, $numMax);
        $suma+= $vec[$i];
    }

    echo "<pre>";
    var_dump($vec);
    echo "</pre>";

    echo "<h2>Suma total = <small> $suma </small></h2>";



?>



</body>
</html>