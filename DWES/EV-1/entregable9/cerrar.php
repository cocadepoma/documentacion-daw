<?php 

    require_once('./sesiones/sesion.php');

    $nombre = $_SESSION['name'];
    
    session_destroy();
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Hasta luego <strong><?php echo $nombre; ?></strong>, cerrando sesión</p>
    <p>Pulsa <a href="login.php">aquí</a> para hacer login de nuevo</p>
    
</body>
</html>