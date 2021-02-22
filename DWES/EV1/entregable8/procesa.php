
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Procesar envío</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js" type="text/javascript"></script>
</head>

<body>
<div class="container">

<?php 
//Código  que incluiremos en el cuerpo del documento para avisar de cómo a finalizado el  proceso.
//************************************************************************************************

$ErrorEnvio = true;

if(isset($_POST['submit'])) {

  $directorio_creado = false;
  $existe_archivo = false;

  /* datos usuario */
  $usuario = $_POST['nombre'];

  /* datos fichero */
  $nombre_fichero = $_FILES['fichero']['name'];
  $tamanyo = $_FILES['fichero']['size'];
  $tipo = $_FILES['fichero']['type'];
  $tamanyo_max_file = 10485760; // 10mb
  
  /* separar extension archivo y su nombre */
  $extension = pathinfo($nombre_fichero, PATHINFO_EXTENSION);
  $nombre = pathinfo($nombre_fichero, PATHINFO_FILENAME);

  /* añadir fecha y hora al archivo para su posterior identificación y evitar problemas */
  $nombre_archivo_bbdd = $nombre ."-".date("m-j-Y-Hms"). "." . $extension;
  
  /* ruta directorio */
  $upload_path = './ficheros/';


  $upload_path_file = $upload_path . $nombre_archivo_bbdd;

  if($_FILES['fichero']['error'] == 0 && $_FILES['fichero']['size'] > 0 && $_FILES['fichero']['size'] < $tamanyo_max_file && strlen($_POST['nombre']) >= 2 ) {

    // Revisar si el directorio existe
    if( is_dir('./ficheros' ) ){
      $directorio_creado = true;

      // Revisar si el archivo ya existe
      if( file_exists($upload_path_file )){
        $existe_archivo = true;
      }
    } else {
      // Si se crea correctamente, true
      if( mkdir('./ficheros' ) ){
        $directorio_creado = true;
        }
    }
    // Si el directorio está creado y se permite el cambio de directorio, [OK]
    if( $directorio_creado && !$existe_archivo && move_uploaded_file( $_FILES['fichero']['tmp_name'], $upload_path_file) ){
      $ErrorEnvio = false;
    }
  } 
}

if($ErrorEnvio) { 
?>
  <div class="alert alert-danger" role="alert">
    <p><?php echo $_POST['nombre']; ?>, se ha producido algún error al intentar enviar el fichero 
       (<?php echo $_FILES['fichero']['name']; ?>). Inténtelo de nuevo.</p>
  </div>
<?php 
} else { 
?>
  <div class="alert alert-success" role="alert">
    <p>Usuario: <?php echo $usuario;?></p>
    <p>El documento ha sido almacenado de forma correcta.</p>
    <ul>
      <li><strong>Nombre</strong>: <?php echo $nombre_archivo_bbdd; ?></li>
      <li><strong>Tipo</strong>: <?php echo $extension; ?></li>
      <li><strong>Tamaño</strong>: <?php echo $tamanyo; ?> bytes</li>
    </ul>
    <p>Si quieres consultarlo se encuentra en la carpeta de archivos <?php echo $upload_path ?></p>
  </div>
<?php 
} 
?>
</div>
</body>
</html>
