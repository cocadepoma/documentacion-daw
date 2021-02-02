<?php

// ERROR BBDD
if (isset($_GET['bderror']) && $_GET['bderror'] == 'true') {
    echo "<p>Error al conectar con la BBDD, inténtelo más tarde</p>";

    if (isset($_GET['typeerror']) && !empty($_GET['typeerror'])) {

        $error_message = $_GET['typeerror'];
        echo "<p><strong>Mensaje del error</strong>: " . $error_message . "</p>";
    }
}
