<!DOCTYPE html>
<html>
<head>
	<title></title>
		<link rel="stylesheet" type="text/css" href="recursos/publicidad/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="recursos/publicidad/css/publicidad.css">
</head>
<body id="error">



	<!-- Button trigger modal-->


<div id="modalAbandonedCart" tabindex="-1" role="dialog"

  aria-labelledby="myModalLabel"
  aria-hidden="true" data-backdrop="false">


  <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-info"
    role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <p class="heading">No permitido
        </p>

      </div>

      <!--Body-->
      <div class="modal-body">

        <div class="row">
          <div class="col-3">
            <p></p>
            <p class="text-center"></p>
          </div>

          <div class="col-9">
            <p>No se ha logueado. Desea loguearse?</p>
            
          </div>
        </div>
      </div>

      <!--Footer-->
      <div class="modal-footer justify-content-center">
        <a type="button" class="btn btn-info" href="index.php?controlador=ControladorLogueo">si</a>
        
        <a type="button" class="btn btn-outline-info waves-effect" data-dismiss="modal" id="btnCancelarSesion">Cancelar</a>
          
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!-- Modal: modalAbandonedCart-->
</body>
<script src="mvc/vistas/sistema/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="mvc/vistas/sistema/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!--<script src="recursos/sistema/js/logueo.js"></script>-->
</html>