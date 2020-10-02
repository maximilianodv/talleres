<?php
class ControladorPublicidad extends Controlador
{
	public function __construct()
	{
		Session::start();
		require_once "mvc/modelos/publicidad/ModeloPublicidad.php";
		require_once "mvc/modelos/convocatorias/ModeloConvocatorias.php";
		require_once "mvc/modelos/inscripcion/ModeloInscripciones.php";
		$this->model=new ModeloPublicidad();
		$this->convocatorias=new ModeloConvocatorias();
		$this->inscripciones=new ModeloInscripciones();
		parent::__construct();

	}
	public function index()
	{
		$sesion=Session::get_SESSION();
		//la variable vista contendre el index de la pagina por si lo de mas falla
		$vista=new Vista("mvc/vistas/publicidad/index.php");
		if(isset($sesion["matricula"]))
		{

			$datos=array('combocarreras'=>$this->carrerasnivel(),
			'talleres'=>$this->model->mostrar(true,
																				$this->convocatorias->periodoactual(),
																				$sesion["nivel"],
																				$this->verificarins($sesion["matricula"],$this->convocatorias->periodoactual()),
																				$this->convocatorias->fechasperiodoactual()
																			),'usuario'=>$sesion["usuario"],'combogrados'=>$this->model->combogrados($this->convocatorias->periodoactual()));
		}
		else
		{
			$datos=array('talleres'=>$this->model->mostrar(false,$this->convocatorias->periodoactual(),null,null,$this->convocatorias->fechasperiodoactual()));
		}

		if($datos==null||$datos==""||count($datos)==0){
			$datos="<h1>El periodo ha finalizado</h1>";
		}
		$vista=new Vista("mvc/vistas/publicidad/index.php",$datos);
	}
	public function secciones()
	{
		$pagina=$_GET["pagina"];
		$datos=array('comboniveles' =>$this->model->comboniveles(),'grados'=>$this->model->combogrados($this->convocatorias->periodoactual()));
		$vista=new Vista("mvc/vistas/publicidad/secciones/"."$pagina".".php",$datos);
	}
	public function mostrar()
	{
		//$iniciosesion=null,$periodo=null,$carrera=null,$taller=null
		$sesion=Session::get_SESSION();

		$inscrito=null;
		$valor=false;

		if(isset($sesion["matricula"]))
		{
			$valor=true;
			$inscrito=$this->verificarins($sesion["matricula"],$this->convocatorias->periodoactual());

			return $this->model->mostrar(true,
																				$this->convocatorias->periodoactual(),
																				$sesion["nivel"],
																				$this->verificarins($sesion["matricula"],$this->convocatorias->periodoactual()),
																				$this->convocatorias->fechasperiodoactual());
		}


		return  $this->model->mostrar($valor,$this->convocatorias->periodoactual(),null,$inscrito,$this->convocatorias->fechasperiodoactual());

	}

	public function carrerasnivel()
	{
			$sesion=Session::get_SESSION();
			$matricula=$sesion["matricula"];
			$nivel=$this->model->nivel($matricula);
			$salida=$this->model->carreras($nivel);

		return $salida;
	}
	public function verificarins($matricula,$periodo)
	{
		//$taller=null;
		$taller=$this->model->verificarins($matricula,$periodo);
		return $taller;
	}
	public function inscripcion()
	{

		$id=$_POST["id"];
		$matricula=$_POST["matricula"];
		if($this->model->inscrito($id,$this->model->espacios($id),$matricula))
		{
				//echo $this->model->mostrarespacio($id);
				echo $this->mostrar();
		}
		else
		{
			echo "<script> alert('Ups! Error);</script> ";
		}

	}
	public function inscribirperiodo()
	{


	//	$ifproroga=$_POST["ifproroga"];
		$carrera=$_POST["carrera"];
		$grado=$_POST["grado"];
		$grupo=$_POST["grupo"];
		$taller=$_POST["taller"];
		$matricula=$_POST["matricula"];
		$respuesta["carrera"]=$carrera;
		$con=$this->convocatorias->periodoactual();
		$estainscrito=$this->inscripciones->iffininscripcion($matricula,$con);
		$inscripcion= new Inscripcion($matricula,null,$carrera,$grado,$grupo,null,$con);
		if($matricula!="" && $estainscrito)
		{

			$this->inscripciones->insertar($inscripcion,$taller);

			$respuesta["abc"]=$this->mostrar();

		}


		echo json_encode($respuesta);
	}
	/*public function push()
	{
		set_time_limit(0); //Establece el número de segundos que se permite la ejecución de un script.
		$fecha_ac = isset($_POST['timestamp']) ? $_POST['timestamp']:0;

		$fecha_bd = $row['timestamp'];

		while( $fecha_bd <= $fecha_ac )
			{
				$query3    = "SELECT timestamp FROM mensajes ORDER BY timestamp DESC LIMIT 1";
				$con       = mysql_query($query3 );
				$ro        = mysql_fetch_array($con);

				usleep(100000);//anteriormente 10000
				clearstatcache();
				$fecha_bd  = strtotime($ro['timestamp']);
			}

		$query       = "SELECT * FROM mensajes ORDER BY timestamp DESC LIMIT 1";
		$datos_query = mysql_query($query);
		while($row = mysql_fetch_array($datos_query))
		{
			$ar["timestamp"]          = strtotime($row['timestamp']);
			$ar["mensaje"] 	 		  = $row['mensaje'];
			$ar["id"] 		          = $row['id'];
			$ar["status"]           = $row['status'];
			$ar["tipo"]           = $row['tipo'];
		}
		$dato_json   = json_encode($ar);
		echo $dato_json;
	}
	*/
}
