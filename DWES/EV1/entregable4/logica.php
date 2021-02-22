<?php
    function obtenerPassword($numero){

        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789`~!@$^*()-_+[]{};:,.>/?";
        $chars.= '"';
        $cnt = 0;   
        $password = '';
      
        if(is_numeric($numero) && $numero >= 8 && $numero <=12) {

            do {
                // Generar un num. aleatorio desde 0 hasta la longitud de $chars-1
                $posicionString = rand ( 0 , strlen($chars)-1 );

                // Cuando el $password es una cadena vacía => guardar el char
                if($cnt == 0) {

                    $password.= $chars{$posicionString};
                    $cnt++;

                } else {
                    /* Si las 2 últimas posiciones del password son iguales al $chars{$posicionString}
                    ** salir y generar otro, en caso contrario concatenar con el $password */
                    if($chars{$posicionString} == $password{strlen($password)-1} && $chars{$posicionString} == $password{strlen($password)-2}){
                        return;
                    } else {
                        $password.= $chars{$posicionString};
                        $cnt++;
                    }
                }
            }while($cnt < $numero);              
        }
          
        return $password;
    }
?>