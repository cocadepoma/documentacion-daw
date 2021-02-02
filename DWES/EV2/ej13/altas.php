<?php
include_once('./sessions/sessions.php');
include_once('./bbdd/connection.php');
include_once('./bbdd/queries.php');
include_once('./templates/layout/header.php');
include_once('./templates/errors/db-access-error.php');

if (!isset($_SESSION['user'])) {
    header('location: ./login.php?access=error');
} else {
    $usr_name = $_SESSION['user'];
    // true if usr IS ADMIN, FALSE if usr ISN'T ADMIN
    $admin = getIfAdmin($usr_name);

    // This page is an ADMIN restricted area
    if ($admin === 0) {
        header('location: ./index.php');
    }
}

include_once('./templates/layout/usr-info.php');

?>

<form action="./bbdd/clients.php" method="post">
    <fieldset>
        <div class="messagge">
            <?php include('./templates/errors/create-errors.php'); ?>
        </div>
        <legend>New Client</legend>
        <label class="mt-1" for="codigo">Código:</label>
        <input class="f-right" type="text" name="codigo" placeholder="Codigo">
        <div style="clear: both;"></div>

        <label class="mt-1" for="cif">CIF:</label>
        <input class="f-right" type="text" name="cif" placeholder="CIF">
        <div style="clear: both;"></div>

        <label class="mt-1" for="nombre">Nombre:</label>
        <input class="f-right" type="text" name="nombre" placeholder="Nombre">
        <div style="clear: both;"></div>


        <label class="mt-1" for="apellidos">Apellidos:</label>
        <input class="f-right" type="text" name="apellidos" placeholder="Apellidos">
        <div style="clear: both;"></div>

        <label class="mt-1" for="direccion">Dirección:</label>
        <input class="f-right" type="text" name="direccion" placeholder="Direccion">
        <div style="clear: both;"></div>

        <label class="mt-1" for="telf">Telf:</label>
        <input class="f-right mt-30" type="text" name="telf" placeholder="Telf">
        <div style="clear: both;"></div>

        <input class="mt-40 f-right" type="submit" value="Create" name="create">
    </fieldset>


</form>
<a href="./index.php">Volver</a>

<?php

include_once('./templates/layout/footer.php');
