<?php
// CREATING SUCCESS && ERROR
if (isset($_GET['creating']) && !empty($_GET['creating'])) {
    if ($_GET['creating'] === 'true') {
        echo "<span class='center success'> User created succesfully!</span>";
    } else {
        echo "<span class='center error'>*An error happened while user creation</span>";
    }
}

// ERROR USER EXISTS
if (isset($_GET['userexist']) && !empty($_GET['userexist'])) {
    if ($_GET['userexist'] === 'true') {
        echo "<span class='center error'>*Error, user already exists</span>";
    }
}

// ERROR EMPTY PARAMS
if (isset($_GET['emptyparams']) && !empty($_GET['emptyparams'])) {
    if ($_GET['emptyparams'] === 'true') {
        echo "<span class='center error'>*Error, inputs must be filled correctly</span>";
    }
}
// BAD PARAMS
if (isset($_GET['badparams']) && !empty($_GET['badparams'])) {
    if ($_GET['badparams'] === 'true') {
        echo "<span class='center error'>*Error, something is wrong</span>";
    }
}
