<?php

    session_start();

    $user = '';
    $password = '';
    $users_file = "../pwd/pwd.csv";
    $encontrado = false;

    if(isset($_POST['user']) && isset($_POST['password']) && strlen($_POST['user']) > 0 && strlen($_POST['password']) > 0 ) {

        $user = $_POST['user'];
        $password = $_POST['password'];


        if(is_file($users_file) && is_readable($users_file)){
        
            if( ($archivo = fopen($users_file, "r")) != FALSE ) {
    
                while($linea = fgetcsv($archivo, 0, ";")) {
    
                    if($linea[0] == $user && $linea[1] == $password) {
    
                        $_SESSION['user'] = $user;
                        $encontrado = true;
                    }

                }  

                if($encontrado) {
                    header('location: ../index.php');
                } else {
                    header('location: ../login.php?error=true');
                }

            } else {
                header('location: ../login.php?error=true');
            }
        } else {
            header('location: ../login.php?error=true');
        } 
    } else {
        header('location: ../login.php?error=true');
    }



?>