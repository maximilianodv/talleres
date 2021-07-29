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
	{
		$sesion=Session::get_SESSION();
		$datos=$this->model->mostrar();
		$vista=new Vista("mvc/vistas/sistema/instructores/vistaInstructores.php",
			$datos);
	}
	public function datosEditar(){

		$idIstructor=$_POST["idInstructor"];
		echo  $this->model->datosEditar($idIstructor);

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
		//print_r("entra por aqui");
		
		$id=$_POST["idInstructor"];
		if($this->model->eliminar($id)==1)
		{
			echo $this->model->mostrar();
		}
		else
		{
			echo $this->model->mostrar();
		}

	}
	public function modificar()
	{
			$id=$_POST["oldInstructor"];
			
			/*
			$this->model->modificar($id,$nombre,$apellidos,$nombreusuario,$correo,$contrasena,$cargo,$actcontrasena,$fecha);*/
			$nombre=$_POST["nombre"];
			$apellidop=$_POST["apellidop"];
			$apellidom=$_POST["apellidom"];
			$correo=$_POST["correo"];
			$telefono=$_POST["telefono"];
			$id_usuario=$_POST["usuario"];

			
			$instructor=new Instructor($id, $nombre, $apellidop, $apellidom,$correo,$telefono,$id_usuario);
			
			
			$resul=$this->model->modificar($instructor);

			echo $this->model->mostrar();
			
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
