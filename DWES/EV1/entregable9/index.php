<?php
    require_once('./sesiones/sesion.php');
    require_once('./templates/saludo.php');
?>

<?php include_once('./templates/header.php'); ?>

    <p>Cosas que puedes hacer</p>
    <ul>
        <li><a href="paginaA.php">Ir a página A</a></li>
        <li><a href="paginaB.php">Ir a página B</a></li>
        <li><a href="paginaC.php">Ir a página C</a></li>
        <li><a href="cerrar.php">Cerrar sesión</a></li>
    </ul>

<?php include_once('./templates/footer.php'); ?>