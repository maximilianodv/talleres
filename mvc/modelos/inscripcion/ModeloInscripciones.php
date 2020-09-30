<?php

class ModeloInscripciones extends ConexionBD
{
	private $inscripcion;
	private $installer;


	function __construct()
	{
		parent::__construct();
		require_once "mvc/modelos/inscripcion/Inscripcion.php";
		date_default_timezone_set('America/Mexico_City');

	}
	public function insertar($inscripcion,$installer=null)
	{
		$verificarinsert=0;

    //generarid es una funcion para buscar el id maximo que tiene la tabla y sumarle 1 para crear un autoincrement pero sabiendo el id que se agregara
    	$verificarinsert=$verificarinsert+$this->inscripcion($inscripcion,$installer);
    	$verificarinsert=$verificarinsert+$this->inscripciontaller($inscripcion,$installer);
    	return $verificarinsert;
	}
	public function inscripcion($inscripcion,$taller)
	{
		 //se desactiva el autocomit
	  //se declaran las variables con el valor del objeto

	  $this->inscripcion=$inscripcion;
		$matricula=$this->inscripcion->getMatricula();
		$nombre="";
		$carrera=$this->inscripcion->getCarrera();
		$grado=$this->inscripcion->getGrado();
		$grupo=$this->inscripcion->getGrupo();
		$grupo=2;
		$claveconvocatoria=$this->inscripcion->getClaveConvocatoria();
		$superclave=$this->inscripcion->getGrado().$this->inscripcion->getClaveConvocatoria();
	  $this->conexion->autocommit(FALSE);
			//$this->installer=$installer;
		 $insertar="INSERT INTO INSCRIPCION VALUES ('".$matricula."','nombre','".$grado."',".$grupo.",null,'".$claveconvocatoria."',".$carrera.")";

	 try{

        if( !$this->conexion->query($insertar))
          {
        throw new Exception('error!');
          }

      }
        catch( Exception $e )
        {
         $this->conexion->rollback();
          return 1;

        }
 		$this->conexion->commit();
     return 0;
      //return $insertar.$insertartaller;

	}
	public function iffininscripcion($matricula=null,$periodo=null){
		$sql="SELECT *FROM INSCRIPCION WHERE INSCRIPCION.Matricula='{$matricula}' AND ClaveConvocatoria='{$periodo}'";
		$this->resultados=$this->conexion->query($sql);
		$row=$this->resultados->fetch_array();
		$fechabd=$this->fechasconvocatorias($periodo);
		$oDate5 = new DateTime("19-01-2021");
		$hoy= $oDate5->format("Y-m-d");

		$oDate1 = new DateTime("19-01-2021");
		$fechaproroga= $oDate1->format("Y-m-d");

		$oDate2 = new DateTime("22-01-2021");
		$finproroga= $oDate2->format("Y-m-d");

		if($row['Matricula']==null||$row['Matricula']==""){
		//	$fechaproroga<=$hoy && $hoy<$finproroga
			if($fechabd["ProrrogaInicio"]<=$hoy && $hoy<$fechabd["ProrrogaFin"]){
					return false;
			}
			else {
					return true;
			}
		}
		return true;
	}
	public function fechasconvocatorias($clave){
		$sql="SELECT * FROM TALLERES.CONVOCATORIAS WHERE ClaveConvocatoria=$clave";
		$this->resultados=$this->conexion->query($sql);
		$row=$this->resultados->fetch_array();
		return $row;
	}
	public function inscripciontaller($inscripcion,$taller)
	{

		$this->inscripcion=$inscripcion;
				$matricula=$this->inscripcion->getMatricula();
				$nombre="";
		$carrera=$this->inscripcion->getCarrera();
		$grado=$this->inscripcion->getGrado();
		$grupo=$this->inscripcion->getGrupo();
		$grupo=2;
		$claveconvocatoria=$this->inscripcion->getClaveConvocatoria();
		$superclave=$this->inscripcion->getGrado().$this->inscripcion->getClaveConvocatoria();
		$hoy = date('Y-m-j,H:i:s');
	    $this->conexion->autocommit(FALSE);
			//$this->installer=$installer;


			 $insertartaller="INSERT INTO INSTALLERS VALUES ('".$matricula.$taller."',".$taller.",".$matricula.",".$claveconvocatoria.",'".$hoy."')";
	    try{
	          //el if conprueba si todo es correcto
	        if( !$this->conexion->query($insertartaller)){

	        	throw new Exception('error!');
	          }
	          else{
	          		$this->actespaciotaller($taller);
	          }

	      }
	        catch( Exception $e )
	        {
	          //si hubo un erro en el registro enviara el 1 el cual basta para cancelar los registros
	        $this->conexion->rollback();
	          return  1;

	        }
	        //si salio todo bien envia un cero
	        $this->conexion->commit();


	     return 0;


	    /*$sql="SELECT *FROM USUARIOS WHERE Correo='".$usuario->getCorreo()."'";
	              $this->resultados=$this->conexion->query($sql);
	              $row=$this->resultados->fetch_array();
	              $id_usuario=$row["id_usuario"];
	              $usuario->setId_Usuario($id_usuario);*/
	    /*$salida.=" <br>$id<br>$nombre<br>$apellidos<br>$correo<br>$password<br>$activo<br>$creado<br><br>";*/
	}
	public function actespaciotaller($taller){

		/*$update="SELECT ESPACIOS.Max-(SELECT COUNT(*) FROM INSTALLERS WHERE TALLERES_id_taller=5 GROUP BY TALLERES_id_taller) FROM TALLERES,ESPACIOS WHERE id_taller=5 AND TALLERES.Convocatoria=ESPACIOS.ClaveConvocatoria AND TALLERES.Carrera=ESPACIOS.ClaveNivel";*/
		$sql="SELECT ESPACIOS.Max-(SELECT COUNT(*) FROM INSTALLERS WHERE TALLERES_id_taller=$taller GROUP BY TALLERES_id_taller) AS EspaciosDis FROM TALLERES AS TALLSRCH,ESPACIOS WHERE TALLSRCH.id_taller=$taller AND TALLSRCH.Convocatoria=	ESPACIOS.ClaveConvocatoria AND TALLSRCH.Carrera=ESPACIOS.ClaveNivel";

        $this->resultados=$this->conexion->query($sql);
        $row=$this->resultados->fetch_array();
        $espcdip=$row["EspaciosDis"];

         $update="UPDATE TALLERES SET espacio=($espcdip) WHERE id_taller=$taller";

   	    try{

	        if(!$this->conexion->query($update))
	          {
	        	throw new Exception('error!');
	          }

	          	$this->conexion->commit();

	      	}
	        catch( Exception $e )
	        {
	        	$this->conexion->rollback();
	        }


	}
}
?>
