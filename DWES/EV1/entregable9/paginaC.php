<?php
    require_once('./sesiones/sesion.php');
    require_once('./templates/saludo.php');
?>

<?php include_once('./templates/header.php'); ?>

    <h1>Esto es PAG C</h1>
    <p>Cosas que puedes hacer</p>
    <ul>
        <li><a href="paginaA.php">Ir a página A</a></li>
        <li><a href="paginaB.php">Ir a página B</a></li>
        <li>Ir a página C</li>
        <li><a href="cerrar.php">Cerrar sesión</a></li>
    </ul>

<?php include_once('./templates/footer.php'); ?>