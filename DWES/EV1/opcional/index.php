
<?php 
	session_start();

	include_once('templates/header.php');
	
	require_once('config/config.php');
	
?>

<div class="container-dos">

	<h3>Bienvenido a la web 
		<?php 
			if(isset($_SESSION['user'])){
				echo $_SESSION['user'];
			} else {
				echo "usuario anónimo";
			}
		?>
	</h3>
	<?php 	if(isset($_SESSION['user'])) { ?>
		
		<form action="index.php" method="post">
			
			<label for="color">Selecciona color de fondo: </label>
			<select name="bgcolor" id="bgcolor">
			<option selected disabled>-- Selecciona --</option>
				<option value="red">rojo</option>
				<option value="yellow">amarillo</option>
				<option value="black">negro</option>
				<option value="green">verde</option>
				<option value="blue">azul</option>
			</select>
			<br><br>

			<label for="textcolor">Selecciona color tipografía: </label>
			<select name="textcolor" id="textcolor">
			<option selected disabled>-- Selecciona --</option>
				<option value="red">rojo</option>
				<option value="yellow">amarillo</option>
				<option value="black">negro</option>
				<option value="green">verde</option>
				<option value="blue">azul</option>
			</select>

			<br><br>

			<label for="bold">Texto en negrita: </label>
			<label>
				<input type="radio" name="bold" value="true">Si
			</label>
			<label>
				<input type="radio" name="bold" value="false" checked >No
			</label>
			
			<br><br>

			<label for="size">Tamaño tipografía: </label>
			<input type="number" name="size">

			<br><br>
			<label for="party">Party mode: </label>
			<input type="checkbox" name="party">

			<br><br>

			<input type="submit" name="save" value="Dale beretta!">
			<br><br>

		</form>

	<?php } 
		if(isset($_SESSION['user'])) {
			echo "<a href='cerrar.php'>Cerrar sesión</a>";
		} else {
			echo "<p>Si quieres personalizar tu interfaz, debes hacer login</p>";
			echo "<a href='login.php'>Iniciar sesión</a>";
		}
	?>

</div>


<?php include_once('templates/footer.php'); ?>
