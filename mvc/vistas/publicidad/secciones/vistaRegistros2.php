
      <section class="section section-md bg-gray-100">
        <div class="container">
          <h3 class="text-center">Registro</h3>
          <div class="row justify-content-center">
            <div class="col-lg-11 col-xl-9">
              <!-- RD Mailform-->
              <!--<form class="rd-mailform rd-form" data-form-output="form-output-global" data-form-type="contact" method="post" id="FMRegistro">-->
                <form class="rd-mailform rd-form"  id="FMRegistro">
                  <div class="row row-x-16 row-20">
                    
                    <div class="col-md-6">
                      <div class="form-wrap">
                        <!--<input class="form-input" id="tfMatricula" type="text" name="name" data-constraints="@Required">-->
                        <input class="form-input" id="tfMatricula" type="text" name="name" data-constraints="@Required">
                        <label class="form-label" for="tfMatricula">Matricula</label>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-wrap">
                        <input class="form-input" id="tfNombre" type="text" name="text" data-constraints="@Required">
                        <label class="form-label" for="tfNombre" placeholder="Nombre">Nombre</label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-wrap">
                        <input class="form-input" id="tfPaterno" type="text" name="text" data-constraints="@Required">
                        <label class="form-label" for="tfPaterno">Apellido Paterno</label>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-wrap">
                        <input class="form-input" id="tfMaterno" type="text" name="text" data-constraints="@Required">
                        <label class="form-label" for="tfMaterno">Apellido Materno</label>
                      </div>
                    </div>

                     <div class="col-md-6">
                      <div class="form-wrap">
                        <input class="form-input" id="tfTelefono" type="text" name="phone" data-constraints="@PhoneNumber">
                        <label class="form-label" for="tfTelefono">Telefono</label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-wrap">

                        <input class="form-input" id="tfFechaNc" type="date" name="text" >
                        <label class="form-label" for="tfFechaNc"><br>Nacimiento</label>
                      </div>
                    </div>
                     <div class="col-md-6">
                      <div class="form-wrap">
                        <input class="form-input" id="tfCalle" type="text" name="text" data-constraints="@Required">
                        <label class="form-label" for="tfCalle">Calle</label>
                      </div>
                    </div>
                     <div class="col-md-6">
                      <div class="form-wrap">
                        <input class="form-input" id="tfNumero" type="number" name="text"  min="0" data-constraints="@Required">
                        <label class="form-label" for="tfNumero">Numero</label>
                      </div>
                    </div>
                     <div class="col-md-6">
                      <div class="form-wrap">
                        <input class="form-input" id="tfColonia" type="text" name="text" data-constraints="@Required">
                        <label class="form-label" for="tfColonia">Colonia</label>
                      </div>
                    </div>
                     <div class="col-md-6">
                      <div class="form-wrap">
                        <input class="form-input" id="tfMunicipio" type="text" name="text" data-constraints="@Required">
                        <label class="form-label" for="tfMunicipio">Municipio</label>
                      </div>
                    </div>
                   <div class="col-md-6">
                    <div class="form-wrap">
                      <input class="form-input" id="tfCorreo" type="email" name="email" data-constraints="@Required @Email">
                      <label class="form-label" for="tfCorreo">Email</label>
                    </div>
                  </div>
                    
                    <div class="col-md-6">
                      <div class="form-wrap form-button">
                        <button class="button button-block button-primary" id="btnreg" type="submit">Registrarse</button>
                      </div>
                    </div>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </section>

     
   <script src="mvc/vistas/publicidad/js/core.min.js"></script>
    <script src="mvc/vistas/publicidad/js/script.js"></script>
    <script src="recursos/sistema/js/registro.js"></script>

