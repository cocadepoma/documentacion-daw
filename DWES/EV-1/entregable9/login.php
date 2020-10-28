<?php
    session_start();

    if( isset($_SESSION['name']) ) {
        header('Location: index.php');
    }

?>

<?php include_once('./templates/header.php'); ?>

    <div class="contenedor">

        <div class="formulario">

            <?php if( isset($_GET['error'] )) { ?>
                    <p class="error">* Error, usuario no autorizado</p>
            <?php } ?>
            <p class="bold">SUPER LOGIN</p>
            <form action="index.php" method="post">
                
                <div class="nombre">
                    <label for="name">Nombre: </label>
                    <input class="input" type="text" name="name">
                </div>
                <div class="boton">
                    <input class="btn" type="submit" value="Enviar">
                </div>
                
            </form>
        </div>

    </div>    

<?php include_once('./templates/footer.php'); ?>