<?php
class ModeloConvocatorias extends ConexionBD
{

  private $convocatoria;
  private $espacios;
  private $modeloespacio;
  private $espacio;
  public function __construct() 
  {
    parent::__construct();
    require_once 'mvc/modelos/convocatorias/Convocatoria.php';
    require_once 'mvc/modelos/grados/Grado.php';
    require_once 'mvc/modelos/espacios/Espacio.php';
    require_once 'mvc/modelos/espacios/ModeloEspacios.php';
  }
 
  
  public function insertar($convocatoria,$grado,$cuatrimestre=null,$modeloesp=null,$max=null,$min=null)
  {
   
    $this->modeloespacio=$modeloesp;
      //
    $clavecuatri="";
  //  $this->espacios=new Espacio();
   // $this->espacios->setClaveNivel("SSS");
    //echo $this->espacios->getClaveNivel();
    $verificarinsert=0; 
    
        $niveles[0] ="TSU";
        $niveles[1] ="ING";
        
        /*
        $min[0]=1;
        $max[0]=5;
        $min[1]=3;
        $max[1]=8;
        */

    $this->conexion->autocommit(FALSE);

      $verificarinsert=$verificarinsert+$this->insertarconvocatoria($convocatoria);
      //echo $verificarinsert;
      $tamaño=count($cuatrimestre);
      for ($i=0; $i <$tamaño; $i++)
      { 
          $newcuatri=$cuatrimestre[$i];
          $clavecuatri=$newcuatri.$convocatoria->getClaveConvocatoria();
          $grado->setId_Cuatrimestre($clavecuatri);
          $grado->setCuatrimestre($newcuatri);
          $verificarinsert=$verificarinsert+$this->insertgrados($grado);    

      }
         //$this->instructor->setId_Usuario
     
    
    
    //echo $verificarinsert;
    //echo "antes";
     for ($j=0; $j <count($niveles); $j++)
      { 
        
        $espac=new Espacio($convocatoria->getClaveConvocatoria(),$niveles[$j],$max[$j],$min[$j]);
        /*$this->espacios->setClaveNivel($niveles[$i]);
        $this->espacios->setClaveConvocatoria($convocatoria->getClaveConvocatoria());
        $this->espacios->setMax($max[$i]);
        $this->espacios->setMin($min[$i]);*/
        
        $verificarinsert=$verificarinsert+$this->insertarespacio($espac);  
      }
    
    $verificarinsert=$verificarinsert+$this->updateactivos($convocatoria->getClaveConvocatoria());
   /* $carrera[0] ="TSU";
    $carrera[1] ="ING";

    for ($i=0; $i <1 ; $i++)
    { 
        $espacio=new Espacio($convocatoria->getClaveConvocatoria(),$carrera[$i],10+$i,14+$i);
        $verificarinsert=$verificarinsert+$espacios->insertespacio($espacio);  
        echo $verificarinsert;
    }
    */
    //echo  $verificarinsert;
    $verificarinsert==0?$this->conexion->commit():$this->conexion->rollback();
    
  }
  public function comboperiodo()
  {
    $consulta=$this->conexion->query("SELECT * FROM CONVOCATORIAS ORDER BY ClaveConvocatoria DESC");
    $salida="<label for='cbPeriodo'>Periodo</label>
    <select class='form-control' id='cbPeriodo'>";
      while ($row=$consulta->fetch_array())
        {

                $anio=$row["Año"];
                $periodo=$row["Periodo"];
                $clave=$row["ClaveConvocatoria"];
                $salida.="
                           <option value='{$clave}'>$anio $periodo</option>
                         ";
        }
        $salida.="</select>
                             ";
      
      return $salida; 

  }
 
  public function tblConvocatorias()
  {
        
    $resultSet=$this->conexion->query("SELECT * FROM CONVOCATORIAS ORDER BY ClaveConvocatoria DESC");
    $salida = "";
    /*<td><input type='checkbox' id='{$clave}' class='activar' data-id='{$clave}' $estado></td>*/
     $salida= "<div class='table-responsive text-nowrap'>
      <table id='tablaConvocatorias' class='table table-striped'>
      <thead>
        <tr>
          <th>Periodo</th>
          <th>Año</th>
          <th>MIN MAX TSU</th>
          <th>MIN MAX ING</th>
          <th>Fecha convocatoria</th>
          <th>Cierre</th>
          <th>Activo</th>
          <th>Inicio Prorroga</th>
          <th>Fin Prorroga</th>
          <th></th>
         
        </tr>
       </thead>
       <tbody>";

      while($row = $resultSet->fetch_array()) 
      {
        /*row[0] es la columna 0 de la tabla que se esta consultado*/
        $clave=$row['ClaveConvocatoria'];
        $sqlespacios=$this->conexion->query("SELECT * FROM ESPACIOS WHERE ClaveConvocatoria='{$clave}'");
          while ($filas=$sqlespacios->fetch_array())
          {
            if($filas["ClaveNivel"]=="TSU")
              {
                   $alumnosmin=$filas["Min"];
                    $alumnosmax=$filas["Max"];
              }
              if($filas["ClaveNivel"]=="ING")
              {
                  $ingespmin=$filas["Min"];
                  $ingespmax=$filas["Max"];
              }


          }
        $periodo=$row['Periodo'];
        $año=$row['Año'];
       // $alumnosmin=$row["AlumnosMin"];
        //$alumnosmax=$row["AlumnosMax"];
        $fecha=$row["ConvocatoriaFecha"];
        $cierre=$row["CierreConvocatoria"];
        $prginicio=$row["ProrrogaInicio"];
        $prgfin=$row["ProrrogaFin"];
        $activo="";
        $estado=$row["Activo"]=="1"?"checked":"";
        $after=$row["Activo"];
        $salida .=
        "<tr id='{$clave}F'>
           <td>$periodo</td>
           <td>$año</td>
           <td>$alumnosmin - $alumnosmax</td>
           <td> $ingespmin- $ingespmax</td>
           <td>$fecha</td>
           <td>$cierre</td>
        
           <td><input type='radio' id='{$clave}' name='act' class='activar act{$after}' data-id='$clave' data-after='$after' $estado ></td>
              <td>$prginicio</td>
           <td>$prgfin</td>
          <td>
              
              <button type='button' id='$clave' data-clave='$clave' class='btnEditar  btn btn-primary btn-sm' data-target='#editconvocatoria' data-toggle='modal' >
                <i class='fa fa-edit  fa-lg text-white'  data-toggle='modal' data-target='#newarticulo' >Editar</i>
              </button>
              <button type='button' data-clave='$clave' class='btnEliminar btn btn-danger btn-sm'>
                <i class='fa fa-trash  fa-lg text-white'  data-toggle='modal' data-target='#modalconfirmar'>Eliminar</i>
              </button>
           </td>
        </tr>
        ";
      }  

    $salida.= "</tbody></table></div>";
    return $salida;

  }

  
  public function insertarconvocatoria($convocatoria)
  {
     $clave=$convocatoria->getClaveConvocatoria();
    $periodo=$convocatoria->getPeriodo();
    $anio=$convocatoria->getAnio();
    $min=$convocatoria->getAlumnosMin();
    $max=$convocatoria->getAlumnosMax();
    $fecha=$convocatoria->getConvocatoriaFecha();
    $activo=$convocatoria->getActivo();
    $finconvocatoria=$convocatoria->getFinConvocatoria();
    $prginicio=$convocatoria->getPrgInicio();
    $prgfin=$convocatoria->getPrgFin();

    $insertar="INSERT INTO CONVOCATORIAS VALUES ('{$clave}','{$periodo}','{$anio}','{$min}','{$max}','{$fecha}','{$finconvocatoria}','{$activo}','{$prginicio}','{$prgfin}')";
    //echo $insertar;
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
  }
   public function periodoactual()
  {
    
     $sql="SELECT ClaveConvocatoria FROM CONVOCATORIAS WHERE Activo=1";
     //la consulta arrojara el numero mayor de la tabla y se sumara 1
     //ejemplo consulta=17 , 17+1=18, 18 es el nuevo id que se agregara(**())
        $this->resultados=$this->conexion->query($sql);
        $row=$this->resultados->fetch_array();
        $convocatoria=$row["ClaveConvocatoria"];
        //$usuario->setId_Usuario($id_usuario);
        return $convocatoria;
  }
  public function updateactivos($clave)
  {
    
    
    $update="UPDATE CONVOCATORIAS SET Activo='0' WHERE ClaveConvocatoria<>$clave";
   

    try{
  
        if( !$this->conexion->query($update))
          { 
        throw new Exception('error!'); 
          }
         
      }
        catch( Exception $e )
        {
      
          return 1;
        }
      
    return 0;
  }
  public function insertgrados($grado)
  {
    $id=$grado->getId_Cuatrimestre();
    $periodo=$grado->getPeriodo();
    $anio=$grado->getAnio();
    $cuatrimestre=$grado->getCuatrimestre();
    $claveconvocatoria=$grado->getClavePeriodo();
    $insertar="INSERT INTO GRADO VALUES ($id,'{$periodo}',$anio,$cuatrimestre,'{$claveconvocatoria}')";
//    echo  $insertar;
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
  }
   public function cambiarestado($convocatoria,$estadonuevo)
  {
      $activo=$estadonuevo=="true"?"1":"0";
       $update="UPDATE CONVOCATORIAS SET Activo=0";
      
      $this->conexion->query($update);
      $update="UPDATE CONVOCATORIAS SET Activo=$activo WHERE ClaveConvocatoria='{$convocatoria}'";
      //echo $update;
      $this->conexion->query($update);    
  }
  public function insertarespacio($espacio)
  {
    //se desactiva el autocomit
    $this->espacio=$espacio;
    
    $this->conexion->autocommit(FALSE);
    $salida="";
    //se declaran las variables con el valor del objeto usuario recibido
    $clvconvocatoria=$this->espacio->getClaveConvocatoria();
    $clvnivel=$this->espacio->getClaveNivel();
    $min=$this->espacio->getMax();//algo esta mal se cambiara de lugar
    $max=$this->espacio->getMin();//algo esta mal
    //echo "Aqui en espacioas";
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

  public function comboperiodos()
  {
     $salida="<label for='cbPeriodo'>Seleccion de Periodos</label>
              <select class='form-control' id='cbPeriodo'>
                  <option value=''>Todos</option> ";

      $consulta=$this->conexion->query("SELECT * FROM CONVOCATORIAS");
      while ($row=$consulta->fetch_array())
        {
          
          $clave=$row["ClaveConvocatoria"];
          $año=$row["Año"];
          $nombre=$row["Periodo"];
          $salida.="<option value='$clave'>$nombre $año</option>";       
                
        }

      
      return $salida."</select>";   
  }
  public function eliminar($clave)
  {

      $this->conexion->autocommit(FALSE);
      $cont=0;

      $eliminar3="DELETE FROM GRADO WHERE ClaveConvocatoria=$clave";
      //echo $eliminar;
       if($this->conexion->query($eliminar3))
          { 
            $cont=$cont+1;
          }
      $eliminar2="DELETE FROM ESPACIOS WHERE ClaveConvocatoria=$clave";  
         if($this->conexion->query($eliminar2))
          { 
            $cont=$cont+1;
          }
      $eliminar="DELETE FROM CONVOCATORIAS WHERE ClaveConvocatoria=$clave";
      //echo $eliminar;
         if($this->conexion->query($eliminar))
          { 
            $cont=$cont+1;
          }
      
      if($cont==3)
      {
        $this->conexion->commit();
      }
      else
      {
        $this->conexion->rollback();
      }
  }
  public function consulta($clave)
  {
    $buscar="SELECT * FROM CONVOCATORIAS  WHERE ClaveConvocatoria='{$clave}'";
         $this->resultados=$this->conexion->query($buscar);
      $row=$this->resultados->fetch_array();
        
        $convocatoria=$row["ClaveConvocatoria"];
        $periodo=$row['Periodo'];
        $año=$row['Año'];
        $fecha=$row["ConvocatoriaFecha"];
        $cierre=$row["CierreConvocatoria"];
        $prginicio=$row["ProrrogaInicio"];
        $prgfin=$row["ProrrogaFin"];
      //$usuario->setId_Usuario($id_usuario);
      //
      $buscarespaciostsu="SELECT * FROM ESPACIOS WHERE ClaveConvocatoria='{$clave}' AND ClaveNivel='TSU'";
      $this->resultados2=$this->conexion->query($buscarespaciostsu);
      $row2=$this->resultados2->fetch_array();
      	$esptsumin=$row2["Min"];
      	$esptsumax=$row2["Max"];
       $buscarespaciosing="SELECT * FROM ESPACIOS WHERE ClaveConvocatoria='{$clave}' AND ClaveNivel='ING'";
      $this->resultados3=$this->conexion->query($buscarespaciosing);
      $row3=$this->resultados3->fetch_array();

      	$espingmin=$row3["Min"];
      	$espingmax=$row3["Max"];
      

      
       
       $respuesta['convocatoria']=$convocatoria;
       $respuesta['periodo']=$periodo;
       $respuesta['Año']=$año;
       $respuesta['fecha']=$fecha;
       $respuesta['cierre']=$cierre;
       $respuesta['prginicio']=$prginicio;
       $respuesta['prgfin']=$prgfin;
       $respuesta['esptsumin']=$esptsumin;
       $respuesta['esptsumax']=$esptsumax;
       $respuesta['espingmin']=$espingmin;
       $respuesta['espingmax']=$espingmax;


      return $respuesta;
      	//return $convocatoria;


  }

 


}

