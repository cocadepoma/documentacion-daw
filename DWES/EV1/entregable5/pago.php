<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<style>
  .negrita {
    font-weight: bold;
  }
  .gris {
    background-color: #dcd7d7;
    width: 500px;
    padding: 10px;
  }
</style>
</head>

<body>
<?php

    $texto = 'Sin observaciones';
    $seguro = 'No';

    if(isset($_POST['nombre'])) {
      $nombre = $_POST['nombre'];
    }
    if(isset($_POST['apellidos']) && strlen($_POST['apellidos']) > 4) {
      $apellidos = $_POST['apellidos'];
    }
    if(isset($_POST['texto']) && strlen($_POST['apellidos']) > 10) {
      $texto = $_POST['texto'];
    }
    if(isset($_POST['seguro'])) {
      $seguro = 'Si';
    }
    if(isset($_POST['bote'])) {
      $bote = $_POST['bote'];
    }
    if(isset($_POST['localidad'])) {
      $localidad = $_POST['localidad'];
    }
    if(isset($_POST['email']) && strlen($_POST['email']) > 5) {
      $email = $_POST['email'];
    }
    
    if(strlen($_POST['nombre']) > 2 && strlen($_POST['apellidos']) && strlen($_POST['email']) > 5 && $localidad && $bote) {

      echo  "<div class='gris'>";   

      echo  "<p>
              <span class='negrita'>Nombre</span>: $nombre 
              <span class='negrita'>Apellidos</span>: $apellidos
            </p>";

      echo  "<p>
              <span class='negrita'>Seguro</span>: $seguro
              <span class='negrita'>Bote</span>: $bote 
            </p>";

      echo  "<p><span class='negrita'>Observaciones</span>: $texto</p>";

      echo  "<p>
              <span class='negrita'>Ciudad</span>: $localidad
              <span class='negrita'>Email</span>: $email 
            </p>";

      echo "</div>";
    
?>
      <h1>Datos de la tarjeta de cr&eacute;dito</h1>
      <form id="form1" name="form1" method="post" action="comprobar.php">
        <table width="37%" border="0" cellspacing="1">
          <tr>
            <th width="32%" scope="row">N&uacute;mero de tarjeta </th>
            <td width="68%">
              <input name="numero" type="text" size="45" />
            </td>
          </tr>
          <tr>
            <th scope="row">Fecha de caducidad </th>
            <td>
              <input name="mes" type="text" size="3" />
              <input name="anyo" type="text" size="4" />
           </td>
          </tr>
        </table>
        <p>
       
          <input type="submit" name="Submit" value="Pagar" />
        
          <input type="reset" name="Submit2" value="Borrar" />
        
        </p>
      </form>
      <p>&nbsp;</p>
      <p>&nbsp; </p>

<?php

    } else {
      header("Location: http://localhost/trabajos/DAW/entregable5?error=true");
    }
?>

</body>
</html>