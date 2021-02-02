<?php
// ERROR EMPTY PARAMS
if (isset($_GET['access']) && !empty($_GET['access'])) {
    if ($_GET['access'] === 'error') {
        echo "<span class='center error'>*Restricted access area for registered users</span>";
    }
}

// ERROR BAD CREDENTIALS
if (isset($_GET['login']) && !empty($_GET['login'])) {
    if ($_GET['login'] === 'false') {
        echo "<span class='center error'>*User name or user password are wrong</span>";
    }
}

// ERROR EMPTY PARAMS
if (isset($_GET['emptyparams']) && !empty($_GET['emptyparams'])) {
    if ($_GET['emptyparams'] === 'true') {
        echo "<span class='center error'>*Error, inputs must be filled</span>";
    }
}
