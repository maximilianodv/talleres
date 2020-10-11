<!DOCTYPE html>
<html class="wide wow-animation" lang="es">
  <head>
    <title>Home</title>
    <meta name="viewport" content="width=device-width height=device-height initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="google" content="notranslate" />
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
      <div id="principal">
          <section class="section section-md bg-gray-100 text-center">
            <div class="container">
              <div class="badge wow fadeIn"></div>
              <h3 class="wow fadeIn">Talleres Extracurriculares</h3>
              <div class="row row-30 row-xl-60" id="talleres">
                <?php
                    echo $datos['talleres'];
                  ?>
              </div>


            </div>

          </section>
     </div>

      <footer class="section footer-classic">


        <div class="footer-classic-main">
          <div class="container">

            <!--
            <div class="row row-50 justify-content-lg-between">
              <div class="col-sm-7 col-lg-3 col-xl-2"><a class="brand" href="index.php"><img src="mvc/vistas/publicidad/images/logo-default-297x63.png" alt="" width="148" height="31"/></a>
                <p><span style="max-width: 250px;">Since 1999, we have been helping American businesses thrive.</span></p><a class="button button-sm button-default-outline button-winona" href="index.php?controlador=ControladorLogueo">Sign In</a>
              </div>
              <div class="col-sm-5 col-lg-3 col-xl-2">
                <h4 class="footer-classic-title">Who We Are</h4>
                <ul class="list footer-classic-list">
                  <li><a href="about-us.html">About Us</a></li>
                  <li><a href="#">Careers</a></li>
                  <li><a href="#">Our Team</a></li>
                </ul>
              </div>
              <div class="col-sm-7 col-lg-5 col-xl-3">
                <h4 class="footer-classic-title">Quick  Links</h4>
                <ul class="list footer-classic-list footer-classic-list_2-cols">
                  <li><a href="#">Sign Up</a></li>
                  <li><a href="#">News</a></li>
                  <li><a href="#">Our Partners</a></li>
                  <li><a href="#">Pricing</a></li>
                  <li><a href="#">Services</a></li>
                  <li><a href="#">FAQ</a></li>
                  <li><a href="contact-us.html">Contacts</a></li>
                </ul>
              </div>
              <div class="col-sm-5 col-lg-9 col-xl-2">
                <h4 class="footer-classic-title">Get in Touch</h4>
                <div class="row row-20 row-sm-35">
                  <div class="col-6 col-sm-12 col-lg-8 col-xl-12">
                    <div class="row row-10 text-default">
                      <div class="col-lg-6 col-xl-12"><a href="mailto:#">info@demolink.org</a></div>
                      <div class="col-lg-6 col-xl-12"><a class="big" href="tel:#">+1-853-234-65</a></div>
                    </div>
                  </div>
                  <div class="col-6 col-sm-12 col-lg-4 col-xl-12 text-right text-sm-left">
                    <div class="group group-xs"><a class="link link-social-1 mdi mdi-twitter" href="#"></a><a class="link link-social-1 mdi mdi-facebook" href="#"></a><a class="link link-social-1 mdi mdi-instagram" href="#"></a></div>
                  </div>
                </div>
              </div>
            </div>-->
          </div>
        </div>
        <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal2 fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Inscripcion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!--<form id="myForm" method="post" action="" name="theForm">-->
              <div class="modal-body">


                  <div class="col-md-6">
                              <div class="form-wrap">
                                <select class="form-input" id="cbCarrera">
                                    <?php
                                 echo $datos["combocarreras"];
                                ?>
                                </select>
                                <!--<label class="form-label" for="tfTelefono">Telefono</label>-->
                              </div>
                  </div>

                  <div class="col-md-6">
                              <div class="form-wrap">
                                <!--<input class="form-input" id="tfTelefono" type="number" name="phone" required>-->
                                <select class="form-input" id="cbGrado">
                                  <?php
                                    if(isset($datos["combogrados"]))
                                    {
                                      echo $datos["combogrados"];
                                    }


                                  ?>


                                </select>
                                <!--<label class="form-label" for="tfTelefono">Telefono</label>-->

                              </div>
                  </div>

                  <div class="col-md-6">
                              <div class="form-wrap">
                                <input class="form-input" id="tfGrupo" type="text" name="phone" required>
                                <label class="form-label" for="tfGrupo">Grupo</label>
                              </div>
                  </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btnGuardar" data-idtaller="" data-dismiss="modal" onclick="hola();">Guardar</button>
              </div>
      <!--</form>-->
    </div>
  </div>
</div>




        <div class="footer-classic-aside">
          <div class="container">

          </div>
              <?php
                if(isset($datos['usuario']))
                    {

                      $sesion=Session::get_SESSION();
                      echo $datos['usuario'];

                      echo "  <div class='rd-navbar-element'>
                            <span class='sesion' id='".$sesion["matricula"]."'></span>
                      <a class='button button-sm button-header button-winona' href='index.php?controlador=ControladorLogueo&accion=cerrarSesion'>Cerrar Sesion</a>
              </div>";
                    }

             ?>

        </div>
      </footer>
    </div>
    <div class="snackbars" id="form-output-global"></div>
   <script src="mvc/vistas/publicidad/js/core.min.js"></script>
    <script src="mvc/vistas/publicidad/js/script.js"></script>
    <script src="mvc/vistas/publicidad/js/publicidad.js"></script>
  </body>
</html>
