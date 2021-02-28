<?php
class ControladorConvocatorias extends Controlador
{
	public function __construct()
	{
		require_once "mvc/modelos/convocatorias/ModeloConvocatorias.php";
		require_once "mvc/modelos/fecha/fecha.php";
		require_once 'mvc/modelos/grados/ModeloGrados.php';
		require_once "mvc/modelos/espacios/ModeloEspacios.php";
		$this->model=new ModeloConvocatorias();
		$this->modelfecha=new Fecha();
		$this->modelogrado=new ModeloGrados();
		$this->modeloespacios=new ModeloEspacios();
		Session::start();
		parent::__construct();
	}
	public function index()
	{
		$sesion=Session::get_SESSION();
		/*$datos=array('combousuarios' =>$this->model->usuariosintructores(),'mostrar'=>$this->model->mostrar());*/
		$datos=array('tabla'=>$this->model->tblConvocatorias(),'fecha'=>$this->modelfecha);
		$vista=new Vista("mvc/vistas/sistema/convocatorias/vistaConvocatorias.php",$datos);
	}

	public function registrar()
	{

		$periodo=$_POST["periodo"];
		$anio=$_POST["anio"];
	    $min=$_POST["min"];
	    $max=$_POST["max"];
	   	$apertura=$_POST["apertura"];
	   	$claveper=$_POST["claveper"];
	   	$finconvocatoria=$_POST["finconvocatoria"];
	   	$inicioprg=$_POST["inicioprg"];
	   	$finprg=$_POST["finprg"];
	   	/*$minfrm = array();
	   	$maxfrm=array();*/
	   	$minfrm[0]=$min;
        $maxfrm[0]=$max;

        $minfrm[1]=$_POST["mining"];
        $maxfrm[1]=$_POST["maxing"];
	   	$ClaveConvocatoria=$anio.$claveper;
	   	$cuatrimestre;



	   	switch ($claveper)
	   		{
			    case 912:
			        	$cuatrimestre[0] =1;
						$cuatrimestre[1] =4;
						$cuatrimestre[2] =7;
						$cuatrimestre[3] =10;
					break;
			    case 14:
			    		$cuatrimestre[0] = 2;
						$cuatrimestre[1] =5;
						$cuatrimestre[2] =8;
					break;
			    case 58:
			    		$cuatrimestre[0] =3;
						$cuatrimestre[1] =9;
					break;

			    case null:
			    		$cuatrimestre= array(15,16);
			    	break;
			}

	   	$convocatoria=new Convocatoria($ClaveConvocatoria,$periodo,$anio,$min,$max,$apertura,$finconvocatoria,1,0,$inicioprg,$finprg);

	   	$grado=new Grado(1,$periodo,$anio,1,$ClaveConvocatoria);



	   	$this->model->insertar($convocatoria,$grado,$cuatrimestre,$this->modeloespacios,$minfrm,$maxfrm);
			$this->model->crearvistas("TSU",$ClaveConvocatoria);
			$this->model->crearvistas("ING",$ClaveConvocatoria);
			$this->model->listatalleredele("TSU",$ClaveConvocatoria);
			$this->model->listatalleredele("ING",$ClaveConvocatoria);
			$this->model->programarevet("TSU",$ClaveConvocatoria,$finconvocatoria);
			$this->model->programarevet("ING",$ClaveConvocatoria,$finconvocatoria);
			$this->model->deletevest("TSU",$ClaveConvocatoria,$finprg,"convo");
			$this->model->deletevest("ING",$ClaveConvocatoria,$finprg,"convo");
			$this->model->deletevest("TSU",$ClaveConvocatoria,$finprg,"aeliminar");
			$this->model->deletevest("ING",$ClaveConvocatoria,$finprg,"aeliminar");

	   	echo $this->model->tblConvocatorias();


	}
	public function cambiarestado()
	{
		$convocatoria=$_GET["idconvocatoria"];
		$estado=$_GET["nuevoestado"];
		$this->model->cambiarestado($convocatoria,$estado);
	}
	public function modificar()
	{
		$id=$_POST["id"];
		//$idnew=$_POST["idnew"];
		$periodo=$_POST["periodo"];
		$anio=$_POST["anio"];
	    $min=$_POST["min"];
	    $max=$_POST["max"];
	   	$apertura=$_POST["apertura"];
	   	$claveper=$_POST["claveper"];
	   	$finconvocatoria=$_POST["finconvocatoria"];
	   	$inicioprg=$_POST["inicioprg"];
	   	$finprg=$_POST["finprg"];
	   	$id=$_POST["id"];
	   	/*$minfrm = array();
	   	$maxfrm=array();*/
	   	$minfrm[0]=$min;
        $maxfrm[0]=$max;

        $minfrm[1]=$_POST["mining"];
        $maxfrm[1]=$_POST["maxing"];
	   	$ClaveConvocatoria=$anio.$claveper;
	   	$cuatrimestre;



	   	switch ($claveper)
	   		{
			    case 912:
			        	$cuatrimestre[0] =1;
						$cuatrimestre[1] =4;
						$cuatrimestre[2] =7;
						$cuatrimestre[3] =10;
					break;
			    case 14:
			    		$cuatrimestre[0] = 2;
						$cuatrimestre[1] =5;
						$cuatrimestre[2] =8;
					break;
			    case 58:
			    		$cuatrimestre[0] =3;
						$cuatrimestre[1] =9;
					break;

			    case null:
			    		$cuatrimestre= array(15,16);
			    	break;
			}

	   	$convocatoria=new Convocatoria($ClaveConvocatoria,$periodo,$anio,$min,$max,$apertura,$finconvocatoria,1,$inicioprg,$finprg);

	   	$grado=new Grado(1,$periodo,$anio,1,$ClaveConvocatoria);



	   	$this->model->updateconvocatoria($convocatoria,$id);
	   	$this->model->updateespacios($ClaveConvocatoria,"ING",$minfrm[1],$maxfrm[1]);
	   	$this->model->updateespacios($ClaveConvocatoria,"TSU",$min,$max);
	   	echo $this->model->tblConvocatorias();
	}

	public function eliminar()
	{
		$id=$_GET["idconvocatoria"];
		//echo $id;
		$this->model->eliminar($id);
		$this->model->eliminarvistas("TSU",$id,"convo");
		$this->model->eliminarvistas("ING",$id,"convo");
		$this->model->eliminarvistas("TSU",$id,"aeliminar");
		$this->model->eliminarvistas("ING",$id,"aeliminar");
		$this->model->deleventoaeliminar("ING",$id);
		$this->model->deleventoaeliminar("TSU",$id);
		$this->model->deleventoconvo("ING",$id);
		$this->model->deleventoconvo("TSU",$id);
		$this->model->delevento("ING",$id);
		$this->model->delevento("TSU",$id);
		echo $this->model->tblConvocatorias();
	}
	public function buscar()
	{
		$id=$_GET["idconvocatoria"];
		echo json_encode($this->model->consulta($id));
	}
	public function buscarmodclvper(){
		$id=$_POST["claveper"];
		echo json_encode($this->model->consulta($id,"modificar"));
	}
	public function historial(){
		$matricula=$_POST["matricula"];
		echo json_encode($this->model->historialalumno($matricula));
	}
	public function changefinz(){
		$id=$_GET["id"];
		$interruptor=$_GET["interruptor"];
		$this->model->interruptor($id,$interruptor);

	}




}

?>
