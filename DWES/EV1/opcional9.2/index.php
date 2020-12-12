
<?php 
	session_start();

	include_once('templates/header.php');
	
	require_once('config/config.php');
	
?>

<div class="container-dos">
	<header>
		<h2>
			<small>Bienvenido a la web</small> 		
			<?php 
				if(isset($_SESSION['user'])){
					echo $_SESSION['user'];
				} else {
					echo "usuario anónimo";
				}
			?>
		</h2>

		<div class="close">
			<?php
				if(isset($_SESSION['user'])) {
					echo "<a class='button logoff' href='cerrar.php'>Cerrar sesión</a>";
				} else {
					echo "<a class='button login' href='login.php'>Iniciar sesión</a>";
				}
			?>
		</div>
	</header>
	
	<main>
		<?php if(isset($_SESSION['user'])) { ?>
			 <h3>Edita la página a tu gusto</h3>
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

		<?php } ?>
		<p>Lorem fistrum apetecan de la pradera a wan diodenoo me cago en tus muelas. Torpedo la caidita diodenoo torpedo la caidita condemor ese que llega. Llevame al sircoo condemor me cago en tus muelas a gramenawer diodenoo torpedo va usté muy cargadoo. Al ataquerl a peich quietooor a wan sexuarl a peich benemeritaar a peich. Llevame al sircoo te voy a borrar el cerito ese que llega jarl me cago en tus muelas ahorarr ese hombree. Amatomaa ahorarr sexuarl diodeno sexuarl por la gloria de mi madre caballo blanco caballo negroorl qué dise usteer va usté muy cargadoo. Ese que llega a gramenawer ese hombree jarl me cago en tus muelas ahorarr apetecan te va a hasé pupitaa papaar papaar fistro. Quietooor ese pedazo de diodeno diodeno qué dise usteer sexuarl pecador apetecan no te digo trigo por no llamarte Rodrigor. No te digo trigo por no llamarte Rodrigor benemeritaar hasta luego Lucas quietooor se calle ustée.

Tiene musho peligro va usté muy cargadoo al ataquerl al ataquerl sexuarl a gramenawer no te digo trigo por no llamarte Rodrigor caballo blanco caballo negroorl. Al ataquerl está la cosa muy malar ese hombree a wan a wan llevame al sircoo al ataquerl. Jarl me cago en tus muelas te voy a borrar el cerito está la cosa muy malar no te digo trigo por no llamarte Rodrigor tiene musho peligro está la cosa muy malar apetecan quietooor diodeno de la pradera. Ese que llega pecador quietooor la caidita pupita. Apetecan no puedor a peich a peich. A gramenawer quietooor por la gloria de mi madre ese que llega está la cosa muy malar. Diodeno jarl mamaar ese que llega a peich diodeno hasta luego Lucas ahorarr pupita.

Ahorarr llevame al sircoo no puedor benemeritaar caballo blanco caballo negroorl te voy a borrar el cerito. Al ataquerl hasta luego Lucas condemor ese pedazo de fistro benemeritaar no puedor tiene musho peligro de la pradera diodeno papaar papaar. Tiene musho peligro pecador hasta luego Lucas al ataquerl. Ahorarr pecador sexuarl me cago en tus muelas pupita no puedor condemor va usté muy cargadoo. Pupita pecador tiene musho peligro pupita jarl amatomaa la caidita tiene musho peligro a gramenawer mamaar diodenoo. </p>
	</main>
</div>


<?php include_once('templates/footer.php'); ?>
