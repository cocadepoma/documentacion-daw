<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Formulario de envio</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js" type="text/javascript"></script>
</head>

<body>
<div class="container">
  <DIV id="PANEL_0" class="panel panel-primary text-justify">
  <DIV class="panel-heading">
    <H3 class="panel-title">Envio de solicitud</H3>
  </DIV>
  <DIV class="panel-body">
    <FORM id="form_envio" method="POST" action="procesa.php" name="form_envio" enctype="multipart/form-data">
      <DIV class="form-group has-feedback">
        <label for="nombre" role="button">Nombre solicitante</label>
        <INPUT id="nombre" type="text" name="nombre" size="35" aria-describedby="spannombre" placeholder="Nombre completo" class="form-control" />
        <SMALL id="nombre" class="form-text text-muted">Escribir en formato: Apellidos, Nombre</SMALL>
        <SPAN class="glyphicon glyphicon-font form-control-feedback"></SPAN>
        <SPAN id="spannombre" class="sr-only">...</SPAN>
      </DIV>
      <DIV class="form-group has-feedback">
        <label for="fichero" role="button">Fichero adjunto:</label>
        <INPUT id="fichero" type="file" name="fichero" class="form-control" />
      </DIV>
      <input type="hidden" name="MAX_FILE_SIZE" value="10000">
      <BUTTON id="btn_enviar" type="submit" class="btn btn-sm btn-primary" name="submit">Enviar fichero</BUTTON>
      <BUTTON id="btn_cancelar" type="reset" class="btn btn-sm btn-danger">Reiniciar</BUTTON>
    </FORM>
  </DIV>
  </DIV>
</div>
</body>
</html>
