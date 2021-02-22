<?php

    /* ENTREGABLE 3 */
    /* Escribir un formulario y un php que lo procese,
    ** que me diga con un “alert” si el nif introducido es correcto o no */


    // Comprobar si existe el name="dni" y si contiene algo
    if(isset($_POST['dni']) && $_POST['dni'] != '') {

        $dni = $_POST['dni'];
        $longitud = strlen($dni);

        // Si la longitud (srtlen($dni) es igual a 9, longitud buena
        if($longitud == 9){

            $letra = substr($dni, $longitud-1);
            $numeros = substr($dni, 0, $longitud-1);

            // Se ha separado el número de la letra, si son números y letra, es bueno
            if(is_numeric($numeros) && is_numeric($letra) != 1){
                
                // LLamada a la función que comprueba si el formato es válido
                if(validarDni($numeros, $letra)){
                    mensaje("NIF correcto!!");
                }else {
                    mensaje("El NIF no es correcto");
                }
            } else {
                mensaje("El NIF no es correcto");
            }
        } else {
            mensaje("No coincide el número de dígitos");
        }
    } else {
        mensaje("No has introducido un NIF y su letra");
    }

    // Función que comprueba si el número y letra de un DNI se corresponden
    function validarDni($numeros, $letra){

        $letras_dni = array('T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E');
        $letra_dni = $numeros % 23;

        // La letra se compara siempre en mayúsculas
        if($letras_dni[$letra_dni] === strtoupper($letra)) {
            return true;
        } else {
            return false;
        }
    }

    // Función que acepta un mensaje y lo genera como alerta
    function mensaje($mensaje){
        echo "<script language='javascript'> alert('$mensaje'); </script>";
    }
?>