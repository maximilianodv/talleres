<?php

class ControladorListas extends Controlador
{
	
	private $modelo;
	function __construct()
	{
		require_once "mvc/modelos/lista/ModeloListas.php";
		$this->modelo=new ModeloListas();
		require_once "mvc/modelos/convocatorias/ModeloConvocatorias.php";
		$this->convocatoria=new ModeloConvocatorias();

		require_once "mvc/modelos/talleres/ModeloTalleres.php";
		$this->talleres=new ModeloTalleres();
		
		require_once "mvc/modelos/niveles/ModeloNiveles.php";
		$this->niveles=new ModeloNiveles();

		parent::__construct();
	}

	public function index()
	{
		$datos=array('tabla' =>$this->modelo->tabla(null,null,null,"true"),'convocatoria'=>$this->convocatoria->comboperiodos(),"talleres"=>$this->talleres->combotalleres(),"niveles"=>$this->niveles->niveles());
		$vista=new Vista("mvc/vistas/sistema/listas/vistaListas.php",$datos);
	}

		public function mostrar()
	{
		//return  $this->modelo->tabla();
		$periodo=$_POST["periodo"];
		//=$periodo;
		
		$respuesta["periodo"]= $this->modelo->tabla($periodo);

		$respuesta["talleres"]=$this->talleres->combotalleres($periodo);
		echo json_encode($respuesta);
	}
	public function inscritostaller()
	{
		$taller=$_POST["taller"];
		echo $this->modelo->tabla(null,$taller);

	}
	public function n()
	{
		
		$periodo=$_POST["periodo"];
		$respuesta["tabla"]=$this->modelo->tabla($periodo);
		$respuesta["combos"]=$this->talleres->combotalleres($periodo);
		echo $this->modelo->tabla($periodo);
	}
}
?>
