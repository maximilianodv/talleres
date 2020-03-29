<?php
class ControladorLogueo extends Controlador
{
	function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
	    Session::destroy();
		$vista=new Vista("mvc/vistas/logeo/vista_Sesion2.php");

	}
	public function loguear()
	{
		require "mvc/modelos/logueo/ModeloLogueo.php";
		$this->model=new ModeloLogueo();
		Session::start();
		
		$respuesta["controlador"]="ControladorLogueo";
		$_POST["usuario"]=htmlspecialchars($_POST["usuario"]);
		$_POST["password"]=htmlspecialchars($_POST["password"]);
		$usuariolim=$_POST["usuario"];
		
		if(isset($_POST["usuario"]) && isset($_POST["password"]))
		{
			$usuarion=$this->model->usuarioalumno($_POST["usuario"]);
			if($usuarion!="")
			{
				
				$_POST["usuario"]=$usuarion;

			}
			else
			{
				$usuarion=$this->model->buscarcuenta($_POST["usuario"]);
				$_POST["usuario"]=$usuarion;
			}

		  if($this->model->loguear($_POST["usuario"],$_POST["password"])=="Si")
		  {
		  	$tipo=$this->model->tipousuario($_POST["usuario"],$_POST["password"]);
		  	Session::setSession("tipo",$tipo);
		  	if($tipo=="ALUMNO")
		  	{
		  		$respuesta["controlador"]="ControladorPublicidad";
		  		$matricula=$this->model->matricula($_POST["usuario"]);
		  		$nivel=$this->model->buscarnivel($_POST["usuario"]);
		  		Session::setSession("matricula",$matricula);
		  		Session::setSession("nivel",$nivel);

		  	}
		  	else if($tipo=="ADMIN")
		  	{
		  		
		  		$respuesta["controlador"]="ControladorAdminLTE";
		  	}
		  	else if($tipo=="INSTRUCTOR")
		  	{
		  		$respuesta["controlador"]="ControladorAdminLTE";	
		  	}
		  	//$usuario=$this->model->idusuario($_POST["usuario"],$_POST["password"]);
		  	
		  	//$id=$this->model->idusuario($_GET["usuario"],$_GET["password"]);
		  	//Session::setSession("usuario",$_POST["usuario"]);
		  	Session::setSession("usuario",$usuariolim);
		  	//Session::setSession("usuario",$_POST["usuario"]);
		  	 
		  	//Session::setSession("matricula",$_POST["usuario"]);
		  	//Session::setSession("idusuario",$id);
		  	//$cargo=$this->model->cargo($_GET["usuario"],$_GET["password"]);
		  	//Session::setSession("cargo",$cargo);
		  	//$respuesta["controlador"]="ControladorAdminLTE";
		  }

		}
	 echo json_encode($respuesta);
	}


	public function cerrarSesion()
	{
		Session::destroy();
		header('Location:index.php');
		/*session_start();
		session_destroy();*/
	}
}
