<?php
class ControladorInstructores extends Controlador
{
	public function __construct()
	{
		require_once "mvc/modelos/instructores/ModeloInstructores.php";
		$this->model=new ModeloInstructores();
		Session::start();
		parent::__construct();
	}
	public function index()
	{	$sesion=Session::get_SESSION();
		$datos=$this->model->mostrar();
		$vista=new Vista("mvc/vistas/sistema/instructores/vistaInstructores.php",
			$datos);
	}

	public function uno()
	{
		$salida="";
		$nombre=$_POST["nombre"];
		$apellidop=$_POST["apellidop"];
	    $apellidom=$_POST["apellidom"];
	    $correo=$_POST["correo"];
	    $telefono=$_POST["telefono"];
	    $password=$_POST["password"];
	    $nombreusuario=$_POST["usuario"];
	    $tipousuario="INSTRUCTOR";
    	$usuario=new Usuario(null,$nombre,$apellidop." ".$apellidom,$correo,$password,"1","'2000-10-10 09:09:20'",$tipousuario,$nombreusuario);
    	$instructor=new Instructor("22",$nombre,$apellidop,$apellidom,$correo,$telefono,$usuario->getId_Usuario());
    	//$taller=new Taller(null,$taller,$horas,$convocatoria,'1',"2000-00-00",'1',"");

    	$this->model->insertar($usuario,$instructor);
    	echo $this->model->mostrar();

	}
	public function registrar()
	{
		$resultado="";
		$nombre=$_GET["Nombre"];
		$apellidos=$_GET["Apellidos"];
		$nombreusuario=$_GET["Nombreusuario"];
		$correo=$_GET["Correo"];
		$contrasena=$_GET["Contrasena"];
		$activo=$_GET["Activo"];
		$idcargo=$_GET["Idcargo"];
		$creado=$_GET["Creado"];
		$this->model->insertar($nombre,$apellidos,$nombreusuario,$correo,$contrasena,$activo,$idcargo,$creado);


	}

	public function cerrarSesion()
	{
		Session::destroy();
	}
	public function editar()
	{
		$clave=$_POST["clave"];
		echo json_encode($this->model->editar($clave));
	}

	public function eliminar()
	{
		$id=$_POST["id"];
		if($this->model->eliminar($id)==1)
		{
			echo $this->model->mostrartabla();
		}
		else
		{
			echo "0";
		}

	}
	public function modificar()
	{		$id=$_POST["id"];
			$nombre=$_POST["nombre"];
			$apellidos=$_POST["apellidos"];
			$nombreusuario=$_POST["nombreusuario"];
			$correo=$_POST["correo"];
			$contrasena=$_POST["contrasena"];
			$cargo=$_POST["cargo"];
			$actcontrasena=$_POST["actcontrasena"];
			$fecha=$_POST["fecha"];
			$this->model->modificar($id,$nombre,$apellidos,$nombreusuario,$correo,$contrasena,$cargo,$actcontrasena,$fecha);
			echo $this->model->actualizarfila($id);
	}
	public function cambiarestado()
	{
		$idusuario=$_GET["idusuario"];
		$estado=$_GET["nuevoestado"];
		$this->model->cambiarestado($idusuario,$estado);
	}
	public function ejemplo()
	{
		echo $this->model->mostrartabla();
	}

}

?>
