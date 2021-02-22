<?php
    require_once('sesiones/sesiones.php');

    session_destroy();

    header('Location: login.php');

?>