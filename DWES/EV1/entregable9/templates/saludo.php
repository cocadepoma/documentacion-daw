<?php
    if( isset($_SESSION['name']) ) {
        echo "Bienvenido " . $_SESSION['name'];
    }
?>