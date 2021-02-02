<?php
session_start();
include_once('./connection.php');
include_once('./queries.php');
############################# CREATE USERS FORM #############################
// Check submit creation
if (isset($_POST['user-create'])) {
    // Check if inputs are in POST
    if (isset($_POST['name']) && isset($_POST['password']) && isset($_POST['type'])) {

        $name_err = true;
        $pwd_err = true;
        $type_err = true;

        // Check valid name length > 2
        if (!empty($_POST['name']) && strlen($_POST['name']) > 2) {
            if (ctype_alnum($_POST['name'])) {
                $name_err = false;
                $user_name = trim(strtolower(htmlspecialchars($_POST['name'])));
            }
        }
        // Check valid pwd length >= 4
        if (!empty($_POST['password']) && strlen($_POST['password']) >= 4) {
            $pwd_err = false;
            $user_pwd = password_hash($_POST['password'], PASSWORD_DEFAULT);
        }
        //Check valid type
        if ($_POST['type'] == '0' || $_POST['type'] == '1') {
            $type_err = false;
            $user_type = $_POST['type'];
        }

        // If inputs are OK, continue
        if (!$name_err && !$pwd_err && !$type_err) {

            if (checkIfUserExists($user_name)) {
                header("location: ../new-users.php?userexist=true");
            } else {
                insertUser($user_name, $user_pwd, $user_type);
            }
        } else {
            header("location: ../new-users.php?emptyparams=true");
        }
    } else {
        header("location: ../new-users.php?badparams=true");
    }
}
#############################################################################

################################# LOGIN FORM ################################
// Check submit login
if (isset($_POST['login'])) {
    // Check if inputs are in POST
    if (isset($_POST['username']) && isset($_POST['password'])) {

        // Check if inputs are valid
        if (!empty($_POST['username']) && !empty($_POST['password']) && strlen($_POST['username']) > 0 && strlen($_POST['password']) > 0) {

            $login_user_name = strtolower($_POST['username']);
            $login_usr_pwd = $_POST['password'];

            // If user exists, create session and redirect to index.php
            if (loginUser($login_user_name, $login_usr_pwd)) {
                $_SESSION['user'] = $login_user_name;
                header('location: ../index.php');
            } else {
                header('location: ../login.php?login=false');
            }
        } else {
            var_dump($_POST);
            header("location: ../login.php?emptyparams=true");
        }
    }
}
#############################################################################

############################## SESSION DESTROY ##############################
if (isset($_POST['close']) && isset($_SESSION['user'])) {
    session_destroy();
    header('location: ../login.php');
}
#############################################################################
