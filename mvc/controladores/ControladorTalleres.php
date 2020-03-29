<?php
class ControladorTalleres extends Controlador
{
	public function __construct()
	{
		require_once "mvc/modelos/talleres/ModeloTalleres.php";
		require_once "mvc/modelos/convocatorias/ModeloConvocatorias.php";
		require_once "mvc/modelos/fecha/fecha.php";
		$this->combocatorias=new ModeloConvocatorias();
		$this->model=new ModeloTalleres();
		$this->fechas=new Fecha();
		Session::start();
		parent::__construct();
	}
	public function index()
	{	$sesion=Session::get_SESSION();
		$datos=array('combousuarios' =>$this->model->usuariosintructores(),'mostrar'=>$this->model->mostrar(),'comboperiodo'=>$this->combocatorias->comboperiodo());
		$vista=new Vista("mvc/vistas/sistema/talleres/vistaTalleres.php",
			$datos);
	}
	public function reportes()
	{
		echo $this->model->mostrarreporte();
	}
	public function registrar()
	{	
		$resultado="";
		$respuesta="";
	    $taller=$_POST["taller"];
	    $horas=$_POST["horas"];
	    $usuario=$_POST["usuario"];
	   	$temario=$_POST["temario"];
	   	$periodo=$_POST["periodo"];
	   	$carrera=$_POST["carrera"];
	   	$dias=$_POST["dias"];
		$inicio=$_POST["inicio"];
		$fin=$_POST["fin"];
	   		$tsu="";
		   	$ing="";
	   	$cant=$_POST["cant"];
	   	$fecha=$this->fechas->hoy();
	   	$espacio=$this->model->maxalum($periodo,$carrera);

	   	if ($cant==2)
	   	{
		  
		   	$tallerObj=new Taller(null,$taller,$horas,1,$fecha,$usuario,$temario,$periodo,$this->model->inprimearreglos($dias[0],"-"),$inicio[0]."-".$fin[0],$carrera[0],$espacio);
		   	$tallerObj2=new Taller(null,$taller,$horas,1,$fecha,$usuario,$temario,$periodo,$this->model->inprimearreglos($dias[1],"-"),$inicio[1]."-".$fin[1],$carrera[1],$espacio);
		  $respuesta.=$this->model->insertar($tallerObj);
		  $respuesta.=$this->model->insertar($tallerObj2);
		  echo $respuesta;
		   
	   	}
	   	else
	   	{
	   		/*$carrera=$carrera[0];
	   		$dias=$dias[0][0];
		   	$inicio=$inicio[0];
		   	$fin=$fin[0];*/
		  $tallerObj=new Taller(null,$taller,$horas,1,$fecha,$usuario,$temario,$periodo,

		   		$this->model->inprimearreglos($dias[0],"-"),$inicio[0]."-".$fin[0],$carrera[0],$espacio);
		  $respuesta.=$this->model->insertar($tallerObj);
		  //$respuesta.=$this->model->insertar($tallerObj2);
		  echo $respuesta;
	   	}
	  

	   	echo $this->model->mostrar();

	}

	public function subirtemario()
	{
		 foreach($_FILES["miarchivo"]['tmp_name'] as $key => $tmp_name)
		  {
		    //condicional si el fuchero existe
		    if($_FILES["miarchivo"]["name"][$key])
		    {
		      // Nombres de archivos de temporales
		      $archivonombre = $_FILES["miarchivo"]["name"][$key]; 
		      $fuente = $_FILES["miarchivo"]["tmp_name"][$key]; 
		      
		      $carpeta = 'recursos/sistema/temarios/'; //Declaramos el nombre de la carpeta que guardara los archivos
		      
		      if(!file_exists($carpeta)){
		        mkdir($carpeta, 0777) or die("Hubo un error al crear el directorio de almacenamiento"); 
		      }
		      
		      $dir=opendir($carpeta);
		      $target_path = $carpeta.'/'.$archivonombre; //indicamos la ruta de destino de los archivos
		      
		  
		      if(move_uploaded_file($fuente, $target_path)) { 
		        echo "Los archivos $archivonombre se han cargado de forma correcta.<br>";
		        } else {  
		        echo "Se ha producido un error, por favor revise los archivos e intentelo de nuevo.<br>";
		      }
		      closedir($dir); //Cerramos la conexion con la carpeta destino
		    }
		  }
		 
	}
	public function subirconvocatoria()
	{
		
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

		public function subir2()
	{
		$nombre_tem=$_FILES['archivo']['tmp_name'];
		$nombre=$_FILES['archivo']['name'];
		move_uploaded_file($nombre_tem,'recursos/sistema/imagenes/avisos/'.$nombre);
	}
	public function convocatoria()
	{
		echo $this->model->generaconvocatoria();
	}
	
}

?>
