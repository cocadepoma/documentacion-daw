<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head>
<title>formulario cutre</title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<style>
  .caja {
    padding: 30px;
    width: 300px;
    font-weight: bold;
  }
  .success{
    background-color: #bced9e;
    border: 1px solid #6c875b;
  }
  .error{
    background-color: #fcb3b3;
    border: 1px solid #a45b5b;
  }
</style>
</head>

<body>
<?php

  if(isset($_GET['modelo'])) {
    $modelo = $_GET['modelo'];
  }
  if(isset($_GET['error']) &&  isset($_GET['error']) == true) {
    echo "<div class='caja error'>";
    echo "<p>Ha habido un error, intentelo de nuevo más tarde</p>";
    echo "</div>";
  }
  if(isset($_GET['exito']) && $_GET['exito'] == true) {
    $modelo = $_GET['modelo'];
    echo "<div class='caja success'>";
    echo "<p>Has pagado con tu tarjeta $modelo, muchas gracias.</p>";
    echo "<p>El pedido se ha efectuado correctamente, en breve te lloveran las aspirinas</p>";
    echo "</div>";
  }

?>

<form name="form1" method="post" action="pago.php">
  <h2>Venta de aspirinas</h2>
  <p>Nombre: 
    <input name="nombre" id="nombre" size="50" type="text">
  </p>
  <p>Apellidos:
    <input name="apellidos" id="apellidos" size="50" type="text">
  </p>
  <p>Comentarios:</p>
  <p>
    <textarea name="texto" cols="100" rows="10" id="texto"></textarea>
  </p>
  <p> 
    <label>¿En bote? </label>
    <label> 
    <input name="bote" value="Si" checked="checked" type="radio">
    SI</label>
    <label> 
    <input name="bote" value="No" type="radio">
    NO</label>
  </p>
  <p>Pagar seguro de envío: 
    <input name="seguro" id="seguro" value="checkbox" checked="checked" type="checkbox">
    <br>
    <br>
    Vivo en: 
    <select name="localidad" id="localidad">
      <option selected="selected" value="Castellón">Castellón</option>
      <option selected="selected" value="Burriana">Burriana</option>
      <option selected="selected" value="Almazora">Almazora</option>
      <option selected="selected" value="Vila-Real">Vila-Real</option>
      <option value="Otro sitio">Otro sitio</option>
    </select>
  </p>
  <p>Enviar a: 
    <input name="email" id="email" size="50" type="text">
  </p>
 
  <p> 
    <input name="Submit" value="Enviar" type="submit">
    <input name="reset" value="Restablecer" type="reset">
  </p>
</form>


</body></html>