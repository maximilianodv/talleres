<?php
class ModeloTalleres extends ConexionBD
{

  private $taller;
  public function __construct() 
  {
    parent::__construct();
    require_once 'mvc/modelos/talleres/Taller.php';
 
    
  }
  public function mostrarreporte()
  {
      $salida="";

      $consulta="SELECT TALLERES.Nombre,USUARIOS.Nombre,USUARIOS.Apellidos,TALLERES.Dia_s,TALLERES.Horario
      FROM talleres.talleres,TALLERES.USUARIOS WHERE Carrera='TSU' AND USUARIOS.Id_Usuario=TALLERES.Id_Usuario";
    $resultSet=$this->conexion->query($consulta);

      $salida = "
    <table id='example2' class='table table-bordered table-hover'>

    <thead>
      <tr>
        <th>Taller</th>
        <th>Nombre</th>
        <th>Dias</th>
        <th>Horario</th>
        <th></th>
      </tr>
    <thead>
    <tbody>";
     while($row = $resultSet->fetch_array()) 
      {
        $taller=$row[0];

        $nombre=$row[1];
        $apellidos=$row[2];
        $nombrecompleto=$nombre." ".$apellidos;
        $dias=$row[3];
        $horario=$row[4];
        
        $salida .= "
        <tr>
          <td>$taller</td>
          <td>$nombrecompleto</td>
          <td>$dias</td>
          <td>$horario</td>
        </tr>";
      }  
    $salida .= "</tbody></table>";    

    return $salida;

  }


   public function mostrar()
  { 
    $resultSet=$this->conexion->query("SELECT * FROM TALLERES");
    $salida = "
    <table id='example2' class='table table-bordered table-hover'>

    <thead>
      <tr>
        <th>Nombre</th>
        <th>Horas</th>
        <th>Convocatoria</th>
        <th>Descripcion</th>
        <th></th>
      </tr>
    <thead>
    <tbody>";
    while($row = $resultSet->fetch_array()) 
      {
        $id=$row[0];
        $nombre=$row[1];
        $horas=$row[2];
        $convocatoria=$row[3];
       
        $descripcion=$row[7];
        

        $salida .= "
        <tr id=$id >
          <td>$nombre</td>
          <td>$horas</td>
          <td>$convocatoria</td>
          <td>$descripcion</td>
          <td>
            <button type='button' data-id='$id' class='btnEditarT'>Editar</button>
            <button type='button' data-id='$id' class='btnEliminarT'>Eliminar</button>
          </td>            
        </tr>";
      }  
    $salida .= "</tbody></table>";    

    return $salida;
  }
  
  public function insertar($taller)
  {
    $salida="";
    //se declaran lavariables
  
    $this->taller=$taller;

      //verificar insert verifica que proceso salio mal, si todos los procesos salieron arrojara un 0 al sumar lo que retorna cada funcion, si alguna falla no se hace el registro en ninguna tabla
    $verificarinsert=0;
    //generarid es una funcion para buscar el id maximo que tiene la tabla y sumarle 1 para crear un autoincrement pero sabiendo el id que se agregara

   $verificarinsert=$verificarinsert+$this->insertarTaller($this->taller);
      //se verifica si todo sumo cero para hacer las inserciones en la base de datos, si no es asi cancela todas la inserciones
    $verificarinsert==0?$this->conexion->commit():$this->conexion->rollback();
    if($verificarinsert==1)
    {
    return "<script> alert('"."error al registro de ".$this->taller->getCarrera()."');</script>";
    }

   // 
      /*
    $exito_query_ok=false; // our control variable

    $exito_query_ok=$this->insertarUsuario($this->usuario);
    $this->instructor->setId_Usuario($this->usuario->getId_Usuario());
    $exito_query_ok=$this->insertarInstructor($this->instructor);
    $this->taller->setId_Usuario($this->usuario->getId_Usuario());
    $exito_query_ok=$this->insertarTaller($this->taller);
    $exito_query_ok ? $this->conexion->commit() : $this->conexion->rollback();



    echo $exito_query_ok;*/
   // echo $verificarinsert;
  }
  public function insertarUsuario($usuario)
  {
    //se desactiva el autocomit
    $this->conexion->autocommit(FALSE);
    $salida="";
    //se declaran las variables con el valor del objeto usuario recibido
    $id=$usuario->getId_Usuario();
    $nombre=$usuario->getNombre();
    $apellidos=$usuario->getApellidos();
    $correo=$usuario->getCorreo();
    $password=$usuario->getPassword();
    $activo=$usuario->getActivo();
    $creado=$usuario->getCreado();
    $tipousuario=$usuario->getTipoUsuario();
    //hacela insersion
    $insertar="INSERT INTO USUARIOS VALUES ('".$id."','".$nombre."','".$apellidos."','".$correo."','".$password."',".$activo.",".$creado.",'".$tipousuario."')";
  

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
      
    /*$sql="SELECT *FROM USUARIOS WHERE Correo='".$usuario->getCorreo()."'";
              $this->resultados=$this->conexion->query($sql);
              $row=$this->resultados->fetch_array();
              $id_usuario=$row["id_usuario"];
              $usuario->setId_Usuario($id_usuario);*/
    /*$salida.=" <br>$id<br>$nombre<br>$apellidos<br>$correo<br>$password<br>$activo<br>$creado<br><br>";*/

   
    
  }
 
  public function insertarTaller($taller)
  {
    $salida="";
    $this->conexion->autocommit(FALSE);
    
    $id=$taller->getId_Taller();
    $nombretaller=$taller->getNombre();
    $horas=$taller->getNo_Horas();
    $activo=$taller->getActivo();
    $creado=$taller->getCreado();
    $usuariotaller=$taller->getId_Usuario();
    $descripciontaller=$taller->getDescTaller();
    $convocatoria=$taller->getConvocatoriaRuta();
    $dias=$taller->getDias();
    $horario=$taller->getHorario();
    $carrera=$taller->getCarrera();
    $espacio=$taller->getEspacio();

   $insertar="INSERT INTO TALLERES (Nombre, No_horas, Activo, Creado, id_usuario, DescripcionTaller, Convocatoria, Dia_s, Horario, Carrera,Espacio) VALUES ('{$nombretaller}',$horas,$activo,'{$creado}',$usuariotaller, '{$descripciontaller}','{$convocatoria}', '{$dias}', '{$horario}', '{$carrera}',$espacio)";

    //echo $insertar;

    try{
  
        if( !$this->conexion->query($insertar))
          { 
        throw new Exception('error!'); 
          }
         
      }
        catch( Exception $e )
        {
          
          //$this->conexion->rollback();
          return 1;
        }
      //$this->conexion->commit();
    return 0;
  }

  public function generaid()
  {
    //se declara la variable como 0
    $id=0;
    
     $sql="SELECT MAX(id_usuario)AS id_usuario from USUARIOS";
     //la consulta arrojara el numero mayor de la tabla y se sumara 1
     //ejemplo consulta=17 , 17+1=18, 18 es el nuevo id que se agregara(**())
              $this->resultados=$this->conexion->query($sql);
              $row=$this->resultados->fetch_array();
              $id_usuario=$row["id_usuario"];
              $id=$id_usuario+1;
              //$usuario->setId_Usuario($id_usuario);
          return $id;
  }
  public function usuariosintructores()
  {
     $resultSet=$this->conexion->query("SELECT * FROM USUARIOS WHERE TipoUsuario='INSTRUCTOR'");
    $salida = "";
    while($row = $resultSet->fetch_array()) 
      {
        //row[0] es la columna 0 de la tabla que se esta consultado
        $id=$row[0];
        $nombre=$row[1];
        $apellidos=$row[2];
        $nombrecompleto=$nombre." ".$apellidos;
        
        $salida .=
        "
          <option value='$id'>$nombrecompleto</option>
        ";
      }  
    return $salida;    
  }
  public function inprimearreglos($arreglo,$separador=null)
  {
    $salida="";

      foreach ($arreglo as $fila)
      {
        if($salida!="")
        {
          $salida=$salida.$separador.$fila;  
        }
        else
        {
          $salida=$salida.$fila;   
        }
        
      }
      
      return $salida;
  }
  public function generaconvocatoria($carrera)
  {
      $convocatoria=$this->conexion->query("SELECT TALLERES.Nombre,USUARIOS.Nombre,USUARIOS.Apellidos,TALLERES.Dia_s,TALLERES.HorarioFROM talleres.talleres,TALLERES.USUARIOS WHERE Carrera='{$carrera}' AND USUARIOS.Id_Usuario=TALLERES.Id_Usuario");    
      $salida="";
      while ($row=$convocatoria->fetch_array())
      {
        $taller=$row[0];
        $instructor=$row[1]." ".$row[2];
        $dias=$row[3];
        $horario=$row[4];
        
        $salida.="$taller "."$instructor "."$dias "."$horario";

      }
      return $salida;
  }
  public function maxalum($perido=null)
  {
       
     $sql="SELECT AlumnosMax FROM CONVOCATORIAS WHERE ClaveConvocatoria=$perido";
         $this->resultados=$this->conexion->query($sql);
              $row=$this->resultados->fetch_array();
              $espacio=$row[0];
              //$usuario->setId_Usuario($id_usuario);
          return $espacio;
  }
  public function combotalleres($convocatoria=null)
  {
    $condicion="";
    //$convocatoria="2019912";
    $salida="";
    if($convocatoria!=null)
    {
      $condicion.=" WHERE Convocatoria=$convocatoria";
    }

    $salida.="<label for='cbTaller'>Taller</label>
              <select class='form-control' id='cbTaller'>
              <option value=''>Todos </option>
              ";

    $sql="SELECT *FROM TALLERES ".$condicion;
    $this->resultados=$this->conexion->query($sql);
    while ($filas=$this->resultados->fetch_array())
    {
      $nombre=$filas["Nombre"];
      $nivel=$filas["Carrera"];
      $id=$filas["id_taller"];

      $salida.="<option value='$id'> $nombre $nivel </option>";
    }
    $salida.="</select>";

    return $salida;
  }
  

}

