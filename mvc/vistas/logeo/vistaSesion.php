<!DOCTYPE html>
<html>
<head>
	<title>Vista sesion</title>
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" type="text/css" href="recursos/logeo/css/bootstrap.css">
  
  <!--Css creado para cambiar la vista del logeo
  <link rel="stylesheet" type="text/css" href="recursos/logeo/css/bootstrap.min.css"> -->
  <link rel="stylesheet"  type="text/css" href="recursos/logeo/css/global.css">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/><!--Visualizar las comillas y puntos-->
  </head>
  <body>
  	  <div class="container-fluid bg">
  	  <div class="row"><!-- Centrar todo el contenido de las cajas -->
  	  <div class="col-md-4 col-sm-4 col-xs-12"></div>
  	  <div class="col-md-4 col-sm-4 col-xs-12"><!--Para dar tamaño alas cajas  -->
      <form class="form-conatiner">
      <h1>Iniciar sesión</h1>
      <div class="form-group">
      <label for="usuario">Usuario</label>
      <input class="form-control" id="tfUsuario" type="usuario"  placeholder="Ingresar Usuario">
  	  </div>
      <div class="form-group">
      <label for="contraseña">Contraseña</label>
      <input class="form-control" id="tfPassword" type="password" placeholder="Contraseña">
      </div>
      <!--<div class="form-group">    card card-login mx-auto mt-5 // class="col-md-6 offset-md-3"
      <div class="form-check">
      <link rel="stylesheet  type="text/css" href="recursos/logeo/css/global.css" >/*****
      <label class="form-check-label">
      <input class="form-check-input" type="checkbox">Recordarcontraseña</label>
      </div>
      
      </div>-->
      <a class="btn btn-primary" id="btnIniciarSesion">Iniciar Sesión</a>
      <a class="btn btn-danger" id="btnCancelarSesion">Cancelar</a>
	  </div>
	  </form>
	  </div>
	  </div>
	  <div class="col-md-4 col-sm-4 col-xs-12"></div>
	  </div>
    </body>
    <script src="mvc/vistas/sistema/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="mvc/vistas/sistema/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

  <!--Boststrap-->
    <script src="recursos/sistema/js/logueo.js"></script>
</html>