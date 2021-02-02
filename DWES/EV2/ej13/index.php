<?php

session_start();
include_once('./bbdd/connection.php');
include_once('./bbdd/queries.php');
include('./templates/layout/header.php');

// Check if is set $_SESSION['user'], and if is set, check if is an ADMIN or not
if (!isset($_SESSION['user'])) {
    header('location: ./login.php?access=error');
} else {
    $usr_name = $_SESSION['user'];
    // true if usr IS ADMIN, FALSE if usr ISN'T ADMIN
    $admin = getIfAdmin($usr_name);
}

?>
<div class="form-buttons">
    <h4><small>User </small><?php if (isset($_SESSION['user'])) echo $_SESSION['user']; ?></h4>
    <form action="./bbdd/users.php" method="post">
        <input type="submit" value="Close Session" name="close">
    </form>
</div>
<div>
    <?php
    if (isset($_GET['deletion']) && !empty($_GET['deletion'])) {
        if ($_GET['deletion'] === 'true') {
            echo "<p class='success'>Client removed succesfully</p>";
        } elseif ($_GET['deletion'] === 'false') {
            echo "<p class='error'>*Error, client ID doesn't exists</p>";
        }
    }
    if (isset($_GET['insert']) && !empty($_GET['insert'])) {
        if ($_GET['insert'] === 'true') {
            echo "<p class='success'>Client added succesfully</p>";
        }
    }
    ?>
</div>
<div class="form-buttons">
    <?php
    // In case that $admin isn't set don't print buttons
    if (isset($admin)) {

        echo "<form action='./consulta.php' method='post'>";
        echo "<input type='submit' value='Check' name='check'>";
        echo "</form>";

        if ($admin === 1) {
            echo "<form action='./altas.php' method='post'>";
            echo "<input type='submit' value='Insert' name='insert'>";
            echo "</form>";
            echo "<form action='./borrar.php' method='post'>";
            echo "<input type='submit' value='Delete' name='delete'>";
            echo "</form>";
        }
    }

    ?>
</div>

<?php include('./templates/layout/footer.php'); ?>