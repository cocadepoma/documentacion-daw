<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            padding: 300px;
        }
        table {
            text-align: center;
            border-collapse: collapse;
        }
        table td {
            border: 1px solid black;
        }
        thead {
            background-color: lightgray;  
        }
    </style>
</head>
<body>
<?php

// true if month = 1-12
function checkMonth( $month ) {
    if($month > 0 && $month < 13){
        return true;
    } else {
        return false;
    }
}

// true year = 1900-2100
function checkYear( $year ) {
    if($year > 1899 && $year < 2101) {
        return true;
    } else {
        return false;
    }
}

/* VARS */
$month = 0; // mes seleccionado
$year = 0; // año seleccionado
$days_month = 1; // total días del mes seleccionado
$start_day = 1; // posición del día de la semana en el que empieza el mes (lunes=1, martes=2...)
$actual_day = 1; // día del mes que se escribe en la tabla
$week_day = 1; // posición del día de la semana (lunes=1, martes=2...)
$iniciado = false;


if( isset( $_POST['month'] ) && isset( $_POST['year'] ) ) {

    $month = $_POST['month'];
    $year = $_POST['year'];
    
    if( is_numeric( $month ) && is_numeric( $year ) ) {

        if( checkMonth( $month ) && checkYear( $year ) ) {

            /* obtener días que tiene el mes pasado por form */
            $days_month = cal_days_in_month ( CAL_GREGORIAN , $month , $year ); 
            
            /* obtener el número del día que inicia el mes (1=monday, 2=tuesday ... 7=sunday) */                
            $start_day = date( "N", mktime( 0, 0 ,0 , $month, 1, $year )); ?> 

            <table>
                <thead>
                    <tr>
                        <td>Lunes</td>
                        <td>Martes</td>
                        <td>Miércoles</td>
                        <td>Jueves</td>
                        <td>Viernes</td>
                        <td>Sábado</td>
                        <td>Domingo</td>
                    </tr>
                </thead>
                <tbody>
            <?php
                
                while ( $actual_day <= $days_month) {
                    echo "<tr>";
                    
                    do {
                        echo "<td>";

                        /* Si el inicio de mes corresponde al nombre del dia (lunes, martes...)
                         y no se ha iniciado la escritura, comenzar. */
                        if($week_day == $start_day && !$iniciado) {
                            echo $actual_day;
                            $actual_day++;
                            $week_day++;
                            $iniciado = true;
                            echo "</td>";
                        } else {
                            // Si ya se ha iniciado la escritura de los días
                            if($iniciado) {

                                /* Si nos hemos pasado del día, escribir asterisco
                                 Seguirá escribiendo hasta que acabe la semana */
                                if($actual_day > $days_month){
                                    echo "*";
                                    $week_day++;
                                } else {
                                    echo $actual_day;
                                    $actual_day++;
                                    $week_day++;
                                }

                            // Si todavía no se ha iniciado, poner asterisco
                            } else {
                                echo "*";
                                $week_day++;
                            }
                        }
                    }
                    while($week_day <= 7);

                    $week_day=1;
                    echo "</tr>";
                }  
            echo "</tbody></table>";
            echo "<a href='index.php'>Volver atrás</a>";
        } else {
            echo "<h2>Los valores introducidos no son válidos</h2>";
            echo "<p>El mes debe de comprender entre 1 y 12</p>";
            echo "<p>El año debe de comprender entre 1900 y 2100</p>";
        }
    } else {
        echo "<h2>El formulario sólo acepta valores numéricos</h2>";
    }
} else {
    echo "<h2>Deben rellenarse todos los campos</h2>";
}
?>
</body>
</html>

