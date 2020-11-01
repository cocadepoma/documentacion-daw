<?php

    session_start();

    if( isset( $_POST['name'] ) && $_POST['name'] == 'pepe'){
        $_SESSION['name'] = $_POST['name'];
    } 
    
    if( !isset($_SESSION['name']) ) {
        header('location: login.php?error=true');
    } 

?>