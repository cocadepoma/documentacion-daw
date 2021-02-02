<?php
include_once('./connection.php');
include_once('./queries.php');

if (isset($_POST['delete'])) {
    if (isset($_POST['clientid']) && strlen($_POST['clientid']) > 0 && ctype_digit($_POST['clientid']) && $_POST['clientid'] >= 0) {
        $client_ID = intval($_POST['clientid']);
        deleteClient($client_ID);
    } else {
        header('location: ../borrar.php?emptyparams=true');
    }
}

if (isset($_POST['create'])) {

    $client_ID = 0;
    $client_CIF = '';
    $client_name = '';
    $client_surname = '';
    $client_address = '';
    $client_phone = '';

    // Client ID check
    if (isset($_POST['codigo']) && !empty($_POST['codigo']) && ctype_digit($_POST['codigo']) > 0) {

        $client_ID = intval($_POST['codigo']);

        if (checkIfClientExists($client_ID)) {
            header('location: ../altas.php?idexists=true');
        } else { // IF clientID doesn't exists

            // Check data INPUTS
            $cif_bool = isset($_POST['cif']) && !empty($_POST['cif']);
            $name_bool = isset($_POST['nombre']) && !empty($_POST['nombre']);
            $surname_bool = isset($_POST['apellidos']) && !empty($_POST['apellidos']);
            $address_bool = isset($_POST['direccion']) && !empty($_POST['direccion']);
            $number_bool = isset($_POST['telf']) && !empty($_POST['telf']);

            if ($cif_bool && $name_bool && $surname_bool && $address_bool && $number_bool) {

                $client_CIF = trim(htmlspecialchars($_POST['cif']));
                $client_name = trim(htmlspecialchars($_POST['nombre']));
                $client_surname = trim(htmlspecialchars($_POST['apellidos']));
                $client_address = trim(htmlspecialchars($_POST['direccion']));
                $client_phone = trim(htmlspecialchars($_POST['telf']));

                insertClientByID($client_ID, $client_CIF, $client_name, $client_surname, $client_phone, $client_address);
            } else {
                header('location: ../altas.php?emptyparams=true');
            }
        }
    } else {
        header('location: ../altas.php?iderror=true');
    }
}
