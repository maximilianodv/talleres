  <link rel="stylesheet" href="recursos/sistema/ui/css/jquery-ui.css">
  <div class="row">
    
  
  <div class="col col-md-2 form-group">
    <button type="button" class="btn btn-primary form-control" data-toggle="modal" 
    data-target="#nuevousuario">
        Nuevo Usuario
    </button>
    
  </div>

  </div> 
    <div class="row" id="resultados">
        <?php 
                if(isset($datos))
                {
                    echo $datos['tabla'];
                }
            ?>
    </div>
<div id="nuevousuario" class="modal fade" role="dialog" data-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="frmAgregar" role="form" class="form-horizontal" action="javascript:agregar();">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Agregar Usuario</h4>
                        </div>
                        <div class="modal-body">
                            <div class="panel-body">                                    
                                <div class="form-group">
                                    <label class="col-md-4 control-label">* Nombres:</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="NombresAdd" id="tfNombresAdd" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">* Apellidos:</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="ApellidosAdd" id="tfApellidosAdd" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">* Nombre de usuario:</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="NombreUsuarioAdd" id="tfNombreUsuarioAdd" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">* E-mail:</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="EMailAdd" id="tfEMailAdd" onkeyup="javascript: this.value = this.value.toLowerCase();" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">* Contraseña:</label>
                                    <div class="col-md-7">
                                        <input type="password" class="form-control" name="ContrasenaAdd" id="tfContrasenaAdd" value="12345678" />
                                        <span class="help-block">La contraseña por defecto es: 12345678</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">* Cargo:</label>
                                    <div class="col-md-7">
                                        <select class="form-control" name="CargoAdd" id="slcCargoAdd" >
                                            <!--<option value="">Seleccione una opción</option>
                                            <option value="Super Usuario">Super Usuario</option>
                                            <option value="Administrador">Administrador</option>
                                            <option value="Servicios Escolares">Servicios Escolares</option>
                                            <option value="Personal">Personal</option>-->
                                            <option value="0" selected="true">Seleccione una opción</option>
                                            <option value="1" selected="false">Cargo 1</option>
                                            <option value="2" selected="false">Cargo 2</option>
                                            <option value="3" selected="false">Cargo 3</option>
                                        </select>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" style="margin-bottom: 0px;">
                                <label class="col-md-1"></label>
                                <div class="col-md-10">
                                    <div class="alert alert-info" style="background-color: rgba(217, 237, 247, 0.4); color: #29b2e1; display: inline-block;" id="artCamposVacios">
                                       <i class="fa fa-info-circle"></i><strong> Todos lo campos con ( * ) son obligatorios.</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" id="artAgregadoExitoso" style="margin-bottom: 0px; display: none;">
                                <label class="col-md-1"></label>
                                <div class="col-md-10">
                                    <div class="alert alert-success">
                                       <i class="fa fa-check-circle"></i><strong> Agregado con exito.</strong>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success" id="btnAcepAdd">Aceptar</button>
                        </div>
                    </form>
                </div>
            </div>
</div>



<div id="editarusuario" class="modal fade" role="dialog" data-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="frmAgregar" role="form" class="form-horizontal" action="javascript:agregar();">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Modificar Usuario</h4>
                        </div>
                        <div class="modal-body">
                            <div class="panel-body">                                    
                                <div class="form-group">
                                    <label class="col-md-4 control-label">* Nombres:</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="NombresAdd2" id="tfNombresAdd2" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">* Apellidos:</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="ApellidosAdd2" id="tfApellidosAdd2"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">* Nombre de usuario:</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="NombreUsuarioAdd2" id="tfNombreUsuarioAdd2" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">* E-mail:</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="EMailAdd2" id="tfEMailAdd2" onkeyup="javascript: this.value = this.value.toLowerCase();" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type='checkbox' id="cambiocontrasena">
                                    <label class="col-md-4 control-label">* Nueva Contraseña:</label>
                                    <div class="col-md-7">
                                        <input type="password" class="form-control" name="ContrasenaAdd" id="tfContrasenaAdd2" value="12345678"/>
                                        <span class="help-block">La contraseña por defecto es: 12345678</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">* Cargo:</label>
                                    <div class="col-md-7">
                                        <select class="form-control" name="CargoAdd2" id="slcCargoAdd2" >
                                            <option value="0" >Seleccione una opción</option>
                                            <option value="1" >Cargo 1</option>
                                            <option value="2" >Cargo 2</option>
                                            <option value="3" >Cargo 3</option>
                                        </select>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" style="margin-bottom: 0px;">
                                <label class="col-md-1"></label>
                                <div class="col-md-10">
                                    <div class="alert alert-info" style="background-color: rgba(217, 237, 247, 0.4); color: #29b2e1; display: inline-block;" id="artCamposVacios">
                                       <i class="fa fa-info-circle"></i><strong> Todos lo campos con ( * ) son obligatorios.</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" id="ModificadoExitoso" style="margin-bottom: 0px; display: none;">
                                <label class="col-md-1"></label>
                                <div class="col-md-10">
                                    <div class="alert alert-success">
                                       <i class="fa fa-check-circle"></i><strong>Modificado con exito.</strong>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success" id="btnAcepMod">Aceptar</button>
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

<script src="recursos/sistema/js/usuarios.js"></script> 











        