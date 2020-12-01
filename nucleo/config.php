<?php
define("CONTROLADOR_PUBLICIDAD","ControladorPublicidad"); //const CONTROLLER_PUBLICIDAD="ControladorPublicidad"; //Controlador x default
define("CONTROLADOR_SISTEMA","ControladorAdminLTE");
/*
se invoca HEADER Y FOOTER solo caundo se utiliza la case Layout,
si utiliza la clase Vista, HEADER Y FOOTER no son invocados
*/
define("HEADER","mvc/vistas/layout/header.php");//diseño del encabezado de la pagina
define("FOOTER","mvc/vistas/layout/footer.php");//diseño del pie de la pagina
