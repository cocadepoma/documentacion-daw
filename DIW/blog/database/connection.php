<?php

    // Tratar warnings como errores
    mysqli_report(MYSQLI_REPORT_STRICT);

    try {
        $conn = new mysqli('localhost', 'root', '', 'blog');
        $conn -> set_charset("utf8");
    } catch (Exception $e) {
        echo "Error al conectar con la BBDD, inténtelo de nuevo pasados unos minutos";
    }
    
?>