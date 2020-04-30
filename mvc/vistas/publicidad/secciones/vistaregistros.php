<!DOCTYPE html>
<html class="wide wow-animation" lang="es">
  <head>
    <title>Home</title>
    <meta name="viewport" content="width=device-width height=device-height initial-scale=1.0">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="mvc/vistas/publicidad/images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CMuli:100,300,400,600,800">
    <link rel="stylesheet" href="mvc/vistas/publicidad/css/bootstrap.css">
    <link rel="stylesheet" href="mvc/vistas/publicidad/css/fonts.css">
    <link rel="stylesheet" href="mvc/vistas/publicidad/css/style.css">
    <!---inicia estilos modal-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.5/js/bootstrap.js"></script>
    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>

    <!--Fin estilos modal-->
  </head>
  <body>
    <div class="ie-panel"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="mvc/vistas/publicidad/images/ie8-panel/warning_bar_0000_us.jpg" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <div class="preloader" id="loading">
      <div class="preloader-body">
        <div id="loading-center-object">
          <div class="object" id="object_four"></div>
          <div class="object" id="object_three"></div>
          <div class="object" id="object_two"></div>
          <div class="object" id="object_one"></div>
        </div>
      </div>
    </div>
    <!-- Modal -->
<div class="modal fade" id="mdlconvocatoria" tabindex="-1" role="dialog" aria-labelledby="mdlconvocatoriaLabel" style="padding-top: 70px;">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="mdlconvocatoriaLabel"></h4>
      </div>
       <div class="modal-body mb-0 p-0">

        <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
          <iframe class="embed-responsive-item" src="" id="frameconvocatoria"allowfullscreen></iframe>
        </div>

      </div>

    </div>
  </div>
</div>
<!--fin-->
    <div class="page">

      <header class="section page-header">
            <?php
                 new Vista("mvc/vistas/publicidad/layout/encabezado.php");

                        ?>


      </header>


      <section class="section parallax-container context-dark" data-parallax-img="mvc/vistas/publicidad/images/bg-image-6-1.jpg">
        <div class="parallax-content">


        </div>
      </section>
     <!-- <iframe src="recursos/sistema/convocatorias/BASEDEDATOSII.pdf"></iframe>-->
      <!-- Meet Alice-->
        <!-- Get in Touch-->
      <section class="section section-md bg-gray-100">
        <div class="container">
          <h3 class="text-center">Registro</h3>
          <div class="row justify-content-center">
            <div class="col-lg-11 col-xl-9">
              <!-- RD Mailform-->
              <!--<form class="rd-mailform rd-form" data-form-output="form-output-global" data-form-type="contact" method="post" id="FMRegistro">-->
                <form  id="FMRegistro"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" autocomplete="off">
                  <div class="row row-x-16 row-20">

                    <div class="col-md-6">
                      <div class="form-wrap">
                        <!--<input class="form-input" id="tfMatricula" type="text" name="name" required>-->
                        <input class="form-input" id="tfMatricula" type="number" name="name" required>
                        <label class="form-label" for="tfMatricula">Matricula</label>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-wrap">
                        <input class="form-input" id="tfNombre" type="text" name="text"  required>
                        <label class="form-label" for="tfNombre" placeholder="Nombre">Nombre</label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-wrap">
                        <input class="form-input" id="tfPaterno" type="text" name="text" required>
                        <label class="form-label" for="tfPaterno">Apellido Paterno</label>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-wrap">
                        <input class="form-input" id="tfMaterno" type="text" name="text" required>
                        <label class="form-label" for="tfMaterno">Apellido Materno</label>
                      </div>
                    </div>

                     <div class="col-md-6">
                      <div class="form-wrap">
                        <input class="form-input" id="tfTelefono" type="number" name="phone">
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
                        <input class="form-input" id="tfCalle" type="text" name="text" required>
                        <label class="form-label" for="tfCalle">Calle</label>
                      </div>
                    </div>
                     <div class="col-md-6">
                      <div class="form-wrap">
                        <input class="form-input" id="tfNumero" type="text" name="text"  min="0">
                        <label class="form-label" for="tfNumero">Numero</label>
                      </div>
                    </div>
                     <div class="col-md-6">
                      <div class="form-wrap">
                        <input class="form-input" id="tfColonia" type="text" name="text" required>
                        <label class="form-label" for="tfColonia">Colonia</label>
                      </div>
                    </div>
                     <div class="col-md-6">
                      <div class="form-wrap">
                        <input class="form-input" id="tfMunicipio" type="text" name="text" required>
                        <label class="form-label" for="tfMunicipio">Municipio</label>
                      </div>
                    </div>
                   <div class="col-md-6">
                    <div class="form-wrap">
                      <input class="form-input" id="tfCorreoF" type="email" name="email">
                      <label class="form-label" for="tfCorreoF">Email</label>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-wrap">
                      <input class="form-input" id="tfPasswordF" type="password"   required>
                      <label class="form-label" for="tfPasswordF">Password</label>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-wrap" role="">
                      <!--<label class="form-label" for="cbNivel">Nivel</label>
                      <select id='cbNivel' name='tipo' class="form-input" required>
                          <?php
                          //echo $datos["comboniveles"];
                          ?>
                      </select>-->
                      <p align="center">Seleccionar Cuatrimestre</p>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-wrap">
                      <select class="form-input" id="cbGradosR">
                        <?php
                          if(isset($datos["grados"]))
                          {
                            echo $datos["grados"];
                          }


                        ?>


                      </select>
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

      <footer class="section footer-classic">
          <a class="banner" href="https://www.templatemonster.com/intense-multipurpose-html-template.html" target="_blank">
          <!--
          <img src="mvc/vistas/publicidad/images/intense_big_02.jpg" alt=""/>-->
          </a>
        <div class="footer-classic-main">
          <div class="container">

          </div>
        </div>
        <div class="footer-classic-aside">
          <div class="container">
            <p class="rights"><span>&copy;&nbsp;</span><span class="copyright-year"></span><span>&nbsp;</span><span>Businet</span>. All Rights Reserved. Design by <a href="https://www.templatemonster.com">TemplateMonster</a></p>
          </div>
        </div>
      </footer>
    </div>
    <div class="snackbars" id="form-output-global"></div>
   <script src="mvc/vistas/publicidad/js/core.min.js"></script>
    <script src="mvc/vistas/publicidad/js/script.js"></script>
    <script src="recursos/sistema/js/registro.js"></script>

  </body>
</html>
