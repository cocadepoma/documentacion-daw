<?php
// ERROR EMPTY PARAMS
if (isset($_GET['emptyparams']) && !empty($_GET['emptyparams'])) {
    if ($_GET['emptyparams'] === 'true') {
        echo "<span class='center error'>*Error, input must be filled with numbers</span>";
    }
}
// Error Client ID doesn't exists
if (isset($_GET['deletion']) && !empty($_GET['deletion'])) {
    if ($_GET['deletion'] === 'false') {
        echo "<p class='error'>*Error, client ID doesn't exists</p>";
    }
}
