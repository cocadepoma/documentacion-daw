<?php

    /* ENTREGABLE 4 */

    function comprobarFechaTarjeta($mes, $anyo){

        $mesServidor = date('m'); // Si es Octubre => 10
        $anyoServidor = date("y"); // Si es 2020 => 20

        $es_valida = false;

        if($anyo <= 30 && $anyo > $anyoServidor){
            $es_valida = true;
        }
        else if($anyo == $anyoServidor && $mes <= 12 && $mes >= $mesServidor){
            $es_valida = true;       
        }
        return $es_valida;
    }

    function modeloTarjeta($numero_tarjeta){

        $marca = '';        
        switch($numero_tarjeta{0}){
            case 3: $marca = 'American Express' ;
                    break;
            case 4: $marca = 'VISA' ;
                    break;
            case 5: $marca = 'MasterCard' ;
                    break;
            case 6: $marca = 'Discover' ;
                    break;
            default: $marca = 'Desconocida';
        }
        return $marca;
    }

    function algoritmoTarjetaCredito($numero_tarjeta){

        $multi = 0; // numero par de la tarjeta * 2
        $suma_pares = 0; 
        $suma_impares = 0;
        $suma_total = 0;

        // Hacer calculos
        for($i = 0; $i < strlen($numero_tarjeta); $i++) {

            //Posición impar del string(número tarjeta)
            if($i % 2 == 0){

                $multi = $numero_tarjeta{$i} * 2;

                if($multi < 9) {
                    $suma_impares+= $multi;                        
                } else {
                    $suma_impares+= $multi-9;          
                }
            //Posición par del string(número tarjeta)
            } else {
                $suma_pares+= $numero_tarjeta{$i};
            }
        }
        return $suma_impares + $suma_pares;
    }

    $numero_tarjeta = 0; // secuencia de números de la tarjeta, su longitud debe ser de 16
    $mes_tarjeta = 0;  // mes caducidad
    $anyo_tarjeta = 0;  // año caducidad tarjeta
    $resultado_suma = 0;
    $tja_valida = false;

    if(isset($_POST['numero']) && isset($_POST['mes']) && isset($_POST['anyo'])) {

        $numero_tarjeta = str_replace(' ', '', $_POST['numero']);
        $mes_tarjeta = $_POST['mes'];
        $anyo_tarjeta = $_POST['anyo'];

        if(strlen($numero_tarjeta) == 16 && is_numeric($numero_tarjeta)){

            if(comprobarFechaTarjeta($mes_tarjeta, $anyo_tarjeta)){
                
                $resultado_suma = algoritmoTarjetaCredito($numero_tarjeta);
            }
        }  
    }

    if($resultado_suma > 0 && $resultado_suma <= 150 && $resultado_suma % 10 == 0) {
        $tja_valida = true; 
    }

    if($tja_valida) {
        $param = modeloTarjeta($numero_tarjeta);
        header("Location: http://localhost/trabajos/DAW/entregable5?exito=true&modelo=$param");
    } else {
        header("Location: http://localhost/trabajos/DAW/entregable5?error=true");
    }
    
?>