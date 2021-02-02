<?php
include_once('./sessions/sessions.php');
include_once('./bbdd/connection.php');
include_once('./bbdd/queries.php');

if (!isset($_SESSION['user'])) {
    header('location: ./login.php?access=error');
} else {
    $usr_name = $_SESSION['user'];
    // true if usr IS ADMIN, FALSE if usr ISN'T ADMIN
    $admin = getIfAdmin($usr_name);
}

include_once('./templates/layout/header.php');
include_once('./templates/errors/db-access-error.php');
include_once('./templates/layout/usr-info.php');
?>

<table>
    <?php if ($admin === 1) { ?>
        <h2 class="center">Clientes</h2>
        <tr class="thead">
            <td>ID</td>
            <td>CIF</td>
            <td>Nombre</td>
            <td>Apellidos</td>
            <td>Dirección</td>
        </tr>
        <?php getAllClients(); ?>
    <?php } elseif ($admin === 0) { ?>
        <h2 class="center">Perfil</h2>
        <tr class="thead">
            <td>User ID</td>
            <td>User Name</td>
        </tr>
    <?php getUsrInfo($usr_name);
    } ?>
</table>

<a href="./index.php">Volver</a>
<?php include_once('./templates/layout/footer.php'); ?>