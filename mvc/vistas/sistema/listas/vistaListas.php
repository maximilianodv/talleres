<link href="recursos/sistema/css/admin.css" media="all" rel="stylesheet" type="text/css" />
  
<div class="row">
      <div class="col col-md-4 form-group">
        <?php 
                if(isset($datos))
                {
                    echo $datos['convocatoria'];
                }
            ?>
      </div>

      <div class="col col-md-4 form-group" id="divtalleres">
        <?php 
                if(isset($datos))
                {
                    echo $datos['talleres'];
                }
            ?>
      </div>

      <!--<div class="col col-md-4 form-group">
        <?php 
                /*if(isset($datos))
                {
                    echo $datos['niveles'];
                }*/
            ?>
      </div>
    -->
 
 

</div> 
    <div class="row" id="resultados">
        <?php 
              if(isset($datos))
                {
                    echo $datos['tabla'];

                }
            ?>
    </div>
<div id="nuevonivel" class="modal fade" role="dialog" data-backdrop="static">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form class="formulario" id="frmNiveles" method="post" >

                        <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Agregar Nivel</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
          
                        <div class="modal-body">
                            <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-3">
                                         
                                            <label for="tfClaveNivel" class="control-label">Clave Nivel</label>
                                            <input type="text" class="form-control" id="tfClaveNivel" placeholder="Clave nivel">
                                        </div>
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                  <label for="tfNombreNivel" class="control-label">Nombre</label>
                                                  <input type="text" class="form-control" id="tfNombreNivel" placeholder="Nombre">
                                                </div>
                                        </div>
                                    </div>
                            </div>
                          </div>
                          
                          <div class="progress progress-striped active">
                                   <div class="progress-bar" style="width: 0%"></div>
                            </div>
                            <div class="form-group" id="artAgregadoExitoso" style="margin-bottom: 0px; display: none;">
                                <label class="col-md-1"></label>
                                <div class="col-md-10">
                                    <div class="alert alert-success">
                                       <i class="fa fa-check-circle"></i><strong> Agregado con exito.</strong>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group" id="artModExitoso" style="margin-bottom: 0px; display: none;">
                                <label class="col-md-1"></label>
                                <div class="col-md-10">
                                    <div class="alert alert-success">
                                       <i class="fa fa-check-circle"></i><strong> Modificación con exito.</strong>
                                    </div>
                                </div>

                            </div>
        
                            <div class="modal-footer">
                                   <button type="button" class="btn btn-secondary " data-dismiss="modal">Cerrar</button>
                                   
                                   <button type="submit"  id="btnGuardar" class="btn btn-primary" >Guardar</button>
                            </div>
                                
                        </form>
                   
                    </div>
            </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="modalconfirmar">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Confirmar</h4>
      </div>
        <div class="modal-body">
            <p id="mensaje"></p>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="modal-btn-si">Si</button>
        <button type="button" class="btn btn-primary" id="modal-btn-no">No</button>
      </div>
    </div>
  </div>
</div>

<script src="recursos/sistema/js/listas.js"></script> 

 









