<!DOCTYPE html>
<html>
<head>
	<title>Vista sesion</title>
  <!-- Bootstrap core CSS -->
  <!--<link rel="stylesheet" type="text/css" href="recursos/logeo/css/bootstrap.css">-->

  <!--Css creado para cambiar la vista del logeo
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   -->
  <link rel="stylesheet"  type="text/css" href="recursos/logeo/css/global.css">
  <link rel="stylesheet" type="text/css" href="recursos/logeo/css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/><!--Visualizar las comillas y puntos-->
  </head>
	  <body>
            <div class="container login-container">
            <div class="row">
                <div class="col-md-3">

                </div>
                <div class="col-md-6 login-form-2">
                    <h3>Ingresar</h3>
                    <form id="formLogin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div class="form-group">
                            <input type="text" class="form-control" id="tfUsuariolg"  placeholder="Usuario *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="tfPasswordlg"  placeholder="Password*" value="" />
                        </div>
                        <div class="form-group">
                         <!--   <input type="submit" id="btnIniciarSesion" class="btnSubmit" value="Login" />-->
                          <input class="btn btn-primary" id="btnIniciarSesion" value="Login" />
                        </div>
                        <div class="form-group">

                            <!--<a href="#" class="ForgetPwd" value="Login">Forget Password?</a>-->
                        </div>
                    </form>
                </div>
                <div class="col-md-3">

                </div>
            </div>
        </div>
    </body>
   <script src="mvc/vistas/sistema/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
    <script src="mvc/vistas/sistema/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>-->

  <!--Boststrap-->
    <script src="recursos/sistema/js/logueo.js"></script>
</html>
