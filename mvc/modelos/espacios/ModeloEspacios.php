<?php
class ModeloEspacios extends ConexionBD
{
  private $espacio;
  
  public function __construct() 
  {
    parent::__construct();
    require_once 'mvc/modelos/espacios/Espacio.php';
  }
 
   public function mostrar()
  { 
    
  }
  
  public function insertarespacio($espacio)
  {
    //se desactiva el autocomit
    $this->espacio=$espacio;
    
    //$this->conexion->autocommit(FALSE);
    $salida="";
    //se declaran las variables con el valor del objeto usuario recibido
    $clvconvocatoria=$this->espacio->getClaveConvocatoria();
    $clvnivel=$this->espacio->getClaveNivel();
    $max=$this->espacio->getMax();
    $min=$this->espacio->getMin();
    
    //hacela insersion INSERT INTO `ESPACIOS` (`ClaveConvocatoria`, `ClaveNivel`, `Min`, `Max`) VALUES ('201914', 'TSU', '10', '30'), ('201914', 'ING', '5', '19');
    
    $insertar="INSERT INTO ESPACIOS (ClaveConvocatoria,ClaveNivel,Max,Min) VALUES ('".$clvconvocatoria."','".$clvnivel."',".$max.",".$min.")";
    //echo $insertar;

    try{
          //el if conprueba si todo es correcto 
        if( !$this->conexion->query($insertar))
          { 
        throw new Exception('error!'); 
          }
          
      }
        catch( Exception $e )
        {
          //si hubo un erro en el registro enviara el 1 el cual basta para cancelar los registros
          return 1;
          
        }
        //si salio todo bien envia un cero
     return 0;
      

   
    
  }
  
}

