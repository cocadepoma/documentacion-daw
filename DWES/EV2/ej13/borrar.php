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

    // This page is an ADMIN restricted area
    if ($admin != 1) {
        header('location: ./index.php');
    }
}

include_once('./templates/layout/header.php');
include_once('./templates/errors/db-access-error.php');
include_once('./templates/layout/usr-info.php');

?>

<form action="./bbdd/clients.php" method="post">
    <fieldset>
        <div class="messagge">
            <?php include('./templates/errors/delete-errors.php'); ?>
        </div>
        <legend>Delete Client</legend>
        <input type="text" name="clientid" placeholder="Client ID">
        <input type="submit" value="Delete" name="delete">
    </fieldset>
</form>
<br>
<a href="./index.php">Volver</a>


<?php
include_once('./templates/layout/footer.php');
