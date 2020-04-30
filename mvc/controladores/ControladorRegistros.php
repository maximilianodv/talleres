<?php
class ControladorRegistros extends Controlador
{
	public function __construct()
	{
		require_once "mvc/modelos/registros/ModeloRegistros.php";

		$this->model=new ModeloRegistros();
		parent::__construct();

	}
	/*public function index()
	{
		$sesion=Session::get_SESSION();

		$datos=array('tabla'=><1this></1this>->model->tblConvocatorias(),'fecha'=>$this->modelfecha);
		$vista=new Vista("mvc/vistas/Sistema/convocatorias/vistaConvocatorias.php",$datos);
	}
	*/
	public function registrar()
	{


		$matricula=htmlspecialchars($_POST["matricula"]);
		$nombre=htmlspecialchars($_POST["nombre"]);
		$paterno=htmlspecialchars($_POST["paterno"]);
	    $materno=htmlspecialchars($_POST["materno"]);
	    $telefono=htmlspecialchars($_POST["telefono"]);
	   	$fechanc=htmlspecialchars($_POST["fechanc"]);
	   	$calle=htmlspecialchars($_POST["calle"]);
	   	$numero=htmlspecialchars($_POST["numero"]);
	   	$colonia=htmlspecialchars($_POST["colonia"]);
	   	$municipio=htmlspecialchars($_POST["municipio"]);
	   	$correo=htmlspecialchars($_POST["correo"]);
	   	$password=htmlspecialchars($_POST["password"]);
	   	$nivel=htmlspecialchars($_POST["niv"]);
			$grado=htmlspecialchars($_POST["grado"]);
		setlocale(LC_ALL,"es_MX");
		// Día del mes con 2 dígitos, y con ceros iniciales, de 01 a 31
		$dia=date("d");
		// Mes actual en 2 dígitos y con 0 en caso del 1 al 9, de 1 a 12
		$mes=date("m");
		// Año actual con 4 dígitos, ej 2013
		$año=date("Y");
		// Horario de 24 horas con ceros, de 01 a 23
		$hora=date("H");
		// minutos con ceros iniciales
		$min=date("i");
		// segundos con ceros iniciales
		$seg=date("s");
		$fecha="'".$año."-".$mes."-".$dia." ".$hora.":".$min.":".$seg."'";
		/*echo $nivel;
		echo $_POST["niv"];*/



	   	$registro=new Registro($matricula,$nombre,$paterno,$materno,$telefono,null,null,null,$fechanc,$calle,$numero,$colonia,$municipio,$correo,$nivel);
	   	$registro->setNivel($nivel);
			$registro->setGrado($grado);

	   	$usuario=new Usuario(null,$nombre,$paterno." ".$materno,$correo,$password,"1",$fecha,"ALUMNO");
	   	echo $this->model->insertar($registro,$usuario);




	}


}

?>
