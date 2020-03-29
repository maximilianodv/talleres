<link href="recursos/sistema/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
<link href="recursos/sistema/css/admin.css" media="all" rel="stylesheet" type="text/css" />
  <div class="row">
      <div class="col col-md-2 form-group">
        <button type="button" class="btn btn-primary form-control" data-toggle="modal" 
        data-target="#nuevotaller">
            Agregar Taller
        </button>
    </div>
     <div class="col col-md-4 form-group">
        <button type="button" class="btn btn-primary form-control" id="btnCnvTSU">
            Generar Convocatoria TSU
        </button>
    </div>
        

  </div> 
    <div class="row" id="resultados">
        <?php 
                if(isset($datos))
                {
                    echo $datos['mostrar'];

                }
            ?>
    </div>
<div id="nuevotaller" class="modal fade" role="dialog" data-backdrop="static">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form class="formulario" id="form_taller" method="post" >

                        <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Agregar taller</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
          
                        <div class="modal-body">
                            <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-3">
                                         
                                            <label for="tfTaller" class="control-label">Taller</label>
                                            <input type="text" class="form-control" id="tfTaller" placeholder="Taller">
                                        </div>
                                        <div class="col-md-3">
                                             <label for="tfHoras" class="control-label">Horas</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-clock-o"></i>
                                                </div>
                                                <input type="number" class="form-control" id="tfHoras" placeholder="Horas" max="100" min="1" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Usuario</label>
                                                    <select class="form-control" id="tfUsuario">
                                                      
                                                       
                                                    </select>
                                                </div>
                                        </div>
                                    </div>
                            </div>
                            
                            <div class="row">
                                    <div class="form-group">
                                            <div class="col-md-12">
                                                <label>Temario</label>
                                                <div class="form-group file-loading">
                                                   <input id="input-b5" id="miarchivo[]" name="miarchivo[]" type="file" multiple>
                                                </div>

                                            </div>
                                    </div>
                                    
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6">
                                     
                                    </div>
                                    <div class="col-md-6">
                                            <label>Nivel</label>
                                                
                                          

                                            
                                    </div>
                                    
                                </div>
                                    


                            </div>
                            <div class="row">

                                 <div class="form-group">
                                    <div class='col-md-6 dias ocultarboton' id="divTSU">
                                        <label>Dia(s) TSU</label>
                                      
                                    </div>
                                    <div class="col-md-3 bootstrap-timepicker ocultarboton"  id="hrInicioTSU">
                                        <div class="form-group">
                                          <label>Horario</label>

                                          <div class="input-group">
                                            <!--tsuhi= tsuhorainicio-->
                                            <input type="text" class="form-control timepicker" id="TSUhi">

                                            <div class="input-group-addon">
                                              <i class="fa fa-clock-o"></i>
                                            </div>
                                          </div>
                                          <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->
                                    </div>
                                    <div class="col-md-3 bootstrap-timepicker ocultarboton" id="hrFinTSU">
                                        <div class="form-group">
                                          <label></label>

                                          <div class="input-group">
                                            <!--tsuhi= tsuhorafin-->
                                            <input type="text" class="form-control timepicker"  id="TSUhf">

                                            <div class="input-group-addon">
                                              <i class="fa fa-clock-o"></i>
                                            </div>
                                          </div>
                                          <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->
                                    </div>
                                     
                                       
                                </div>
                            </div>
                            <div class="row">
                                 <div class="form-group">
                                    <div class='col-md-6 dias ocultarboton' id="divING">
                                        <label>Dia(s)ING</label>
                                        
                                    </div>
                                 
                                       <div class="col-md-3  bootstrap-timepicker ocultarboton"  id="hrInicioING">
                                        <div class="form-group">
                                          <label>Horario</label>

                                          <div class="input-group">
                                            <input type="text" class="form-control timepicker"  id="INGhi">

                                            <div class="input-group-addon">
                                              <i class="fa fa-clock-o"></i>
                                            </div>
                                          </div>
                                          <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->
                                    </div>
                                    <div class="col-md-3 bootstrap-timepicker ocultarboton" id="hrFinING">
                                        <div class="form-group">
                                          <label></label>

                                          <div class="input-group">
                                            <input type="text" class="form-control timepicker" id="INGhf" >

                                            <div class="input-group-addon">
                                              <i class="fa fa-clock-o"></i>
                                            </div>
                                          </div>
                                          <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->
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
                                   
                                   <button type="submit"  id="btnGuardar" class="btn btn-primary">Guardar</button>
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

<script src="recursos/sistema/js/fileinput.js"></script>
<script src="recursos/sistema/js/niveles.js"></script> 
<script>

</script>

   

 









