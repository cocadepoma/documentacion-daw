<?php
session_start();

require_once('./bbdd/connection.php');

include('./templates/errors/db-access-error.php');

if (isset($_SESSION['user'])) {
    header('location: index.php');
}

include('./templates/layout/header.php');

include('./templates/layout/login-form.php');

include('./templates/layout/footer.php');
