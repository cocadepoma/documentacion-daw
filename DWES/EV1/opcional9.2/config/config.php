<?php

    $bgcolor = 'white'; 	// valores por defecto HTML
	$textcolor = 'black';	// valores por defecto HTML
	$bold = 'unset';	// valores por defecto HTML
	$size = 16;	// valores por defecto HTML
	$party = FALSE;	// valores por defecto HTML
	$array = [];
	$arrayCookies = [];

	if(isset($_SESSION['user'])) {

		$user = $_SESSION['user'];

        // background-color
		if(isset($_POST['bgcolor'])) {
			$array["bgcolor"] = $_POST['bgcolor'];
		} else {
			$array["bgcolor"] = 'white';
		}
        // color
		if(isset($_POST['textcolor'])) {
			$array["color"] = $_POST['textcolor'];
		} else {
			$array["color"] = 'black';
		}
        // font-weight
		if(isset($_POST['bold'])) {
			if($_POST["bold"] != 'false') {
				$array["bold"] = "bold";
			} else {
				$array["bold"] = 'unset';
			}
		} 
		
        // font-size
		if(isset($_POST['size']) && is_numeric($_POST['size'])) {
			
			$size = intval($_POST['size']);

			if($size <= 10) {
				$array["size"] = 10;
			}
			else if($size >= 50 ) {
				$array["size"] = 50;
			} else {
				$array["size"] = $size;
			}
		
		} else {
			$array["size"] = 16;
		}
        
        // party-mode
		if(isset($_POST['party'])) {
			if($_POST['party'] == 'on') {
				$array["party"] = 20000;
			} 
		} else {
			$array["party"] = 0;
		}

        // submit, guardar en una cookie la config, la cookie tiene el nombre del usuario
		if(isset($_POST['save'])) {
			$json = json_encode($array);
			setcookie($user, $json);
			header('Location: index.php');
		}

        // Si la cookie ha sido creada, aplicar estilos con JavaScript
		if(isset($_COOKIE[$user])) {

			$arrayCookies = json_decode($_COOKIE[$user]);
			
			$bgcolor = $arrayCookies->bgcolor;
			$textcolor = $arrayCookies->color;
			$bold = $arrayCookies->bold;
			$size = $arrayCookies->size;
			$party = $arrayCookies->party;
		?>
			<script>
				document.body.style.backgroundColor = "<?php echo $bgcolor; ?>";
				document.body.style.color = "<?php echo $textcolor; ?>";
				document.body.style.fontWeight = "<?php echo $bold; ?>";
				document.body.style.fontSize = "<?php echo $size . 'px'; ?> ";
                document.body.style.marginTop = "<?php echo $party . 'px'; ?>";

                
			</script>
		<?php
		}

	}

?>