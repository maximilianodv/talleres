<?php
require "nucleo/config.php";
require "nucleo/ConexionBD.php";
require "nucleo/Controlador.php";
require "nucleo/Vista.php";
require "nucleo/Session.php";

if(isset($_GET["controlador"])) // condicion que no se va a cumplir
{
	$controlador= $_GET["controlador"];
	require "mvc/controladores/$controlador.php";
}
else
	//se mostrará esta vista
{
	$controlador=CONTROLADOR_PUBLICIDAD;
	require "mvc/controladores/$controlador.php";
}

$objeto=new $controlador();
?>