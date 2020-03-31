<link rel="stylesheet" type="text/css" href="recursos/sistema/css/convocatorias/convocatorias.css">

<div class="row">
    <div class="col col-md-2 form-group">
        <button type="button" class="btn btn-primary form-control" data-toggle="modal" 
        data-target="#nuevaconvocatoria">
            Agregar Convocatoria
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
    <!-- Modal -->
<div class="modal fade" id="nuevaconvocatoria" tabindex="-1" role="dialog" aria-labelledby="nuevaconvocatoriaLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="nuevaconvocatoriaLabel">Nueva Convocatoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form class="formulario" id="form_conv" method="post">
            <div class="modal-body">
                      
                        
                        <div class="form-row">
                              <div class="form-group col-md-3">
                                <label for="tfFechaConvocatoria">Fecha Convocatoria</label>

                                  <?php
                                  echo " <input type='date' value='".$datos['fecha']->hoy()."' class='form-control' id='tfFechaConvocatoria' placeholder='FechaConvocatoria' required='true'>";
                                  ?>
                              </div>

                              <div class="form-group col-md-3">
                                <label for="tfFinCnv">Fin Convocatoria</label>
                                  <?php
                                      echo " <input type='date' value='".$datos['fecha']->hoy()."'  class='form-control' id='tfFinCnv' placeholder='Fin de convocatoria' required='true'>";
                                  ?>
                              </div>

                              <div class="form-group col-md-3">
                                <label for="tfAnio">Año</label>
                                <input type="number" class="form-control" <?php echo "value='".$datos['fecha']->getAnio()."'"; ?> id="tfAnio" placeholder="Anio" required="true">
                              </div>
                              <div class="form-group col-md-3">
                                    <label for="cbPeriodo">Periodo</label>
                                    <select class="form-control" id="cbPeriodo" required="true">
                                      <option value="14">Enero-Abril</option>
                                      <option value="58" >Mayo-Agosto</option>
                                      <option value="912" >Septiembre-Diciembre</option>
                                      
                                    </select>
                              </div> 
                          </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <h3>TSU</h3>
                                </div>
                                <div class="form-group col-md-2">
                                  <label for="tfMax">Maximo</label>
                                  <input type="number" class="form-control" min="0" max="100" id="tfMax" required="true">
                                </div>
                                <div class="form-group col-md-2">
                                  <label for="tfMin">Minimo</label>
                                  <input type="number" class="form-control" min="0" max="100" id="tfMin" required="true">
                                </div>
                                  <div class="form-group col-md-2">
                                    <h3>ING</h3>
                                </div>
                                <div class="form-group col-md-2">
                                  <label for="tfMaxING">Maximo</label>
                                  <input type="number" class="form-control" min="0" max="100" id="tfMaxING" required="true">
                                </div>
                                <div class="form-group col-md-2">
                                  <label for="tfMinING">Minimo</label>
                                  <input type="number" class="form-control" min="0" max="100" id="tfMinING" required="true">
                                </div>
                            </div>
                        <div class="form-row">
                              <div class="form-group col-md-12">
                                <div class="form-group col-md-3">
                                  <label for="tfInicioPrg">Fecha Prorroga</label>

                                    <?php
                                    echo " <input type='date' value='".$datos['fecha']->hoy()."' class='form-control' id='tfInicioPrg' placeholder='FechaConvocatoria' required='true'>";
                                    ?>

                                 
                                </div>

                                <div class="form-group col-md-3 ">
                                  <label for="tfFinPrg">Fin Prorroga</label>
                                    <?php
                                        echo " <input type='date' value='".$datos['fecha']->hoy()."' class='form-control' id='tfFinPrg' placeholder='Fin de convocatoria' required='true'>";
                                    ?>
                                </div>

                              </div>
                               
                        </div>
                  
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-success" id="btnGuardar">Guardar</button>
            </div>
        </form>
    </div>
  </div>
</div>

<!--Modal editar convocatoria-->
<div class="modal fade" id="editconvocatoria" tabindex="-1" role="dialog" aria-labelledby="editconvocatoriaLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editconvocatoriaLabel">Editar Convocatoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="lds-roller" id="loadEd">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
      </div>
        <form class="formularioEd" id="form_convedit" method="post">
            <div class="modal-body">
                      
                        
                        <div class="form-row">
                              <div class="form-group col-md-3">
                                <label for="tfFechaConvocatoriaEd">Fecha Convocatoria</label>
                                    <input type='date' value='' class="form-control" id="tfFechaConvocatoriaEd" placeholder='FechaConvocatoria'  required="true">
                                </div>

                              <div class="form-group col-md-3">
                                <label for="tfFinCnvEd">Fin Convocatoria</label>
                                  <input type="date" name="" class="form-control" id="tfFinCnvEd" placeholder="Fin de la convocatoria" required="true">
                                  
                              </div>
                              <div class="form-group col-md-6">
                                    <label for="cbPeriodoEd">Periodo</label>
                                    <select class="form-control" id="cbPeriodoEd" required="true">
                                      <option id="Ed14" value="14">Enero-Abril</option>
                                      <option id="Ed58" value="58" >Mayo-Agosto</option>
                                      <option id="Ed912" value="912" >Septiembre-Diciembre</option>
                                      
                                    </select>
                              </div> 
                          </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <h3>TSU</h3>
                                </div>
                                <div class="form-group col-md-2">
                                  <label for="tfMaxEd">Maximo</label>
                                  <input type="number" class="form-control" min="0" max="100" id="tfMaxEd" required="true">
                                </div>
                                <div class="form-group col-md-2">
                                  <label for="tfMinEd">Minimo</label>
                                  <input type="number" class="form-control" min="0" max="100" id="tfMinEd" required="true">
                                </div>
                                  <div class="form-group col-md-2">
                                    <h3>ING</h3>
                                </div>
                                <div class="form-group col-md-2">
                                  <label for="tfMaxINGEd">Maximo</label>
                                  <input type="number" class="form-control" min="0" max="100" id="tfMaxINGEd" required="true">
                                </div>
                                <div class="form-group col-md-2">
                                  <label for="tfMinINGEd">Minimo</label>
                                  <input type="number" class="form-control" min="0" max="100" id="tfMinINGEd" required="true">
                                </div>
                            </div>
                        <div class="form-row">
                              <div class="form-group col-md-12">
                                <div class="form-group col-md-3">
                                  <label for="tfInicioPrgEd">Fecha Prorroga</label>
                                   <input type="date" name="" class="form-control" id="tfInicioPrgEd" placeholder="FechaConvocatoriaEd"  required="true">               
                                </div>

                                <div class="form-group col-md-3 ">
                                  <label for="tfFinPrgEd">Fin Prorroga</label>
                                    
                                    <input type="date" name="" class="form-control" id="tfFinPrgEd" placeholder="Fin de la convocatoria" required="true">


                                    
                                </div>

                              </div>
                               
                        </div>
                  
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-success" id="btnGuardarMod">Guardar</button>
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
<!--<input type="radio" name="gender" value="male"> Male<br>
<input type="radio" name="gender" value="female"> Female<br>
<input type="radio" name="gender" value="other"> Other -->

  <!--<div class="col-md-4">
                              <label for="cbActivo">Activar Periodo</label>
                              <select class="form-control" id="cbActivo">
                                <option value="14">2019 Enero-Abril</option>
                                <option value="58" >2019 Mayo-Agosto</option>
                                <option value="912" >2019 Septiembre-Diciembre</option>
                                
                              </select>
                              <input type="checkbox" name="activo" value="1">Activo<br>
    </div> -->
<script src="recursos/sistema/js/convocatorias.js"></script> 