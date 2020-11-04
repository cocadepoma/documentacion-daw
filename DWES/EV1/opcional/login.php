
<?php 
    session_start();

	if(isset($_SESSION['user'])) {
		header('location: index.php');
	}

?>

<?php include_once('templates/header.php'); ?>


<div class="container">
    <span class="error">
        <?php 
            if(isset($_GET['error']) && $_GET['error'] == true) {
                echo "* error al logearse, intentalo de nuevo, si eso";
                echo "<br><br>";
            }
        
        ?>
    
    </span>
    <form action="./bbdd/bbdd.php" method="post">
        <label for="user">Usuario:</label>
        <br>
        <input type="text" name="user" id="user">
        <br><br>
        <label for="password">Password:</label>
        <br>
        <input type="password" name="password" id="password">
        <br><br>

        <input type="submit" name="submit" value="Login">
        <br>
        <br>
        <a href="index.php">Entrar como invitado</a>
    </form>
</div>


<?php include_once('templates/footer.php'); ?>


	

