<?php
class ControladorNiveles extends Controlador
{

	public function __construct()
	{
		Session::start();
		
		require_once "mvc/modelos/niveles/ModeloNiveles.php";
		$this->modelo=new ModeloNiveles();
		parent::__construct();
		
		
	}
	public function index()
	{	
		$sesion=Session::get_SESSION();
		$datos=array('mostrar' => $this->modelo->mostrar());
		$vista=new Vista("mvc/vistas/sistema/niveles/vistaNiveles.php",$datos);
	}
	public function insertar()
	{
		$clave=$_POST["clave"];
		$nombre=$_POST["nombre"];
		$nivel=new Nivel($clave,$nombre);
	    $this->modelo->insertar($nivel);
    	echo $this->modelo->mostrar();
	
	}
	
}

?>
