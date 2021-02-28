<div class="row">
  <div class="col col-md-2 form-group">
    <button type="button" class="btn btn-primary form-control btnmdl" data-toggle="modal"
    data-target="#nuevoinstructor" data-tpbt='btnGuardar' onclick="modal(this)">
        Agregar Instructor
    </button>
  </div>

  </div>
    <div class="row" id="resultados">
        <?php
                if(isset($datos))
                {
                    echo $datos;
                }
            ?>
    </div>
<div id="nuevoinstructor" class="modal fade" role="dialog" data-backdrop="static">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form class="formulario" id="form_instr" method="post">

                        <div class="modal-header">
                            <h5 class="modal-titleinst" id="agregarlabel" class="titulo">Agregar Instructor</h5>
                            <h5 class="modal-titleinst" id="editarlabel"  class="titulo">Editar Instructor</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>

                        <div class="modal-body">

                            <div class="row">
                                <div class="form-group">

                                    <div class="col-md-3">
                                        <label for="tfNombre"
                                        class="control-label">Nombre</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </div>
                                            <input type="text" class="form-control" id="tfNombre" placeholder="Nombre">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="tfApellidoP" class="control-label">Apellido Paterno</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </div>
                                            <input type="text" class="form-control" id="tfApellidoP" placeholder="ApellidoP">
                                        </div>
                                    </div>
                                     <div class="col-md-3">
                                        <label for="tfApellidoM" class="control-label">Apellido Materno</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </div>
                                            <input type="text" class="form-control" id="tfApellidoM" placeholder="ApellidoM">
                                        </div>
                                    </div>

                                     <div class="col-md-3">
                                        <label for="tfCorreo" class="control-label">Correo</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-envelope"></i>
                                            </div>
                                            <input type="email" class="form-control" id="tfCorreo" placeholder="Correo">
                                        </div>
                                    </div>

                                <!--    <div class="col-md-4" id="divimg">

                                        <label for="imgSubir" id="lbimagen" >imagen</label>
                                        <input type="file" name="archivo" id="imgSubir" require>
                                    </div>
                                -->

                                </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-3">
                                            <label for="tfTelefono" class="control-label">Telefono</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-phone"></i>
                                                </div>
                                                <input type="text" class="form-control" id="tfTelefono" placeholder="Telefono">
                                            </div>

                                        </div>
                                        <div class="col-md-3">
                                            <label for="tfPassword" class="control-label">Password</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-lock"></i>
                                                </div>
                                               <input type="password" class="form-control" id="tfPassword" placeholder="Password">
                                            </div>
                                        </div>
                                         <div class="col-md-3">
                                            <label for="tfNomUsuario" class="control-label">Nombre usuario</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                               <input type="text" class="form-control" id="tfNomUsuario" placeholder="Usuario" required>
                                            </div>
                                        </div>

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
                                   <button type="submit"  id="btnEditar" class="btn btn-primary">Editar</button>
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

<script src="recursos/sistema/js/instructores.js"></script>
