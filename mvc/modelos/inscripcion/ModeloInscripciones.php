<?php

class ModeloInscripciones extends ConexionBD
{
	private $inscripcion;
	private $installer;
	function __construct()
	{
		parent::__construct();
		require_once "mvc/modelos/inscripcion/Inscripcion.php";
		
	}
	public function insertar($inscripcion,$installer=null)
	{
		$verificarinsert=0;
  
    //generarid es una funcion para buscar el id maximo que tiene la tabla y sumarle 1 para crear un autoincrement pero sabiendo el id que se agregara
    	$verificarinsert=$verificarinsert+$this->inscripcion($inscripcion,$installer);
    	$verificarinsert=$verificarinsert+$this->inscripciontaller($inscripcion,$installer);
    	
    	$verificarinsert==0?$this->conexion->commit():$this->conexion->rollback();

    	return $verificarinsert;
	}
	public function inscripcion($inscripcion,$taller)
	{
		 //se desactiva el autocomit
	/*$this->inscripcion=$inscripcion;

	
	$matricula=$this->inscripcion->getMatricula();
		$nombre="";
	$carrera=$this->inscripcion->getCarrera();
	$grado=$this->inscripcion->getGrado();
	$grupo=$this->inscripcion->getGrupo();
	$claveconvocatoria=$this->inscripcion->getClaveConvocatoria();
	$superclave=$this->inscripcion->getGrado().$this->inscripcion->getClaveConvocatoria();
    $this->conexion->autocommit(FALSE);
    $salida="";
    //se declaran las variables con el valor del objeto */
    
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
         
          return 1;
          
        }
 
     return 0;
      //return $insertar.$insertartaller;
      
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
	    $this->conexion->autocommit(FALSE);
			//$this->installer=$installer;
		

			 $insertartaller="INSERT INTO INSTALLERS VALUES ('".$matricula.$taller."',".$taller.",".$matricula.",".$claveconvocatoria.")";
	    try{
	          //el if conprueba si todo es correcto 
	        if( !$this->conexion->query($insertartaller))
	          { 
	        throw new Exception('error!'); 
	          }
	          
	      }
	        catch( Exception $e )
	        {
	          //si hubo un erro en el registro enviara el 1 el cual basta para cancelar los registros
	          return  1;
	          
	        }
	        //si salio todo bien envia un cero
	     return 0;
	      
	    /*$sql="SELECT *FROM USUARIOS WHERE Correo='".$usuario->getCorreo()."'";
	              $this->resultados=$this->conexion->query($sql);
	              $row=$this->resultados->fetch_array();
	              $id_usuario=$row["id_usuario"];
	              $usuario->setId_Usuario($id_usuario);*/
	    /*$salida.=" <br>$id<br>$nombre<br>$apellidos<br>$correo<br>$password<br>$activo<br>$creado<br><br>";*/
	}
}
?>