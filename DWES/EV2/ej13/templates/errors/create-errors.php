<?php
// ID error, It'll only accept numbers
if (isset($_GET['iderror']) && !empty($_GET['iderror'])) {
    if ($_GET['iderror'] === 'true') {
        echo "<span class='center error'>*Error, Codigo must be filled with numbers</span>";
    }
}
// If ID already exists
if (isset($_GET['idexists']) && !empty($_GET['idexists'])) {
    if ($_GET['idexists'] === 'true') {
        echo "<span class='center error'>*Error, Client already exists</span>";
    }
}
// If insertion was failed
if (isset($_GET['insert']) && !empty($_GET['insert'])) {
    if ($_GET['insert'] === 'false') {
        echo "<p class='error'>*An error ocurred at the insertion, try it again later</p>";
    }
}
// ERROR EMPTY PARAMS
if (isset($_GET['emptyparams']) && !empty($_GET['emptyparams'])) {
    if ($_GET['emptyparams'] === 'true') {
        echo "<span class='center error'>*Error, inputs must be filled</span>";
    }
}
