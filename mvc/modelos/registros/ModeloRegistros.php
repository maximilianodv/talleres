<?php
class ModeloRegistros extends ConexionBD
{
  private $registro;
  private $usuario;
  public function __construct() 
  {
    parent::__construct();
    require_once 'mvc/modelos/registros/Registro.php';
    require_once 'mvc/modelos/usuarios/Usuario.php';
  }
  

  public function insertarRegistro($registro)
  {
        $this->conexion->autocommit(FALSE);
      $matricula=$registro->getMatricula();
      $nombre=$registro->getNombre();
      $paterno=$registro->getPaterno();
      $materno=$registro->getMaterno();
      $telefono=$registro->getTelefono();
      $fechanc=$registro->getFecha_Nac();
      $calle=$registro->getCalle();
      $numero=$registro->getNumero();
      $colonia=$registro->getColonia();
      $municipio=$registro->getMunicipio();
      $correo=$registro->getCorreo();
      $usuario=$registro->getId_Usuario();
      $niveles=$registro->getNivel(); 


      $insertar="INSERT INTO REGISTRO (Matricula, Nombre,ApellidoP,ApellidoM,Telefono,Fecha_nac,Calle,Numero,Colonia,Municipio,Correo,Usuario,Estatus,ClaveNivel) VALUES ('".$matricula."','".$nombre."','".$paterno."', '".$materno."','".$telefono."','".$fechanc."','".$calle."','".$numero."','".$colonia."','".$municipio."','".$correo."',".$usuario.",'Activo','".$niveles."')";
   
     // echo $insertar;
      try
        {
    
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
  public function insertar($registro,$usuario)
  {
    $salida="";
    //se declaran lavariables
    $this->usuario=$usuario;
    $this->registro=$registro;
    

      //verificar insert verifica que proceso salio mal, si todos los procesos salieron arrojara un 0 al sumar lo que retorna cada funcion, si alguna falla no se hace el registro en ninguna tabla
    $this->conexion->autocommit(FALSE);
    $verificarinsert=0;
    //generarid es una funcion para buscar el id maximo que tiene la tabla y sumarle 1 para crear un autoincrement pero sabiendo el id que se agregara
    $this->usuario->setId_Usuario($this->generaid());

    $verificarinsert=$verificarinsert+$this->insertarUsuario($this->usuario);
    $this->registro->setId_Usuario($this->usuario->getId_Usuario());
    $verificarinsert=$verificarinsert+$this->insertarRegistro($this->registro);
    //$this->taller->setId_Usuario($this->usuario->getId_Usuario());
    //$verificarinsert=$verificarinsert+$this->insertarTaller($this->taller);
      //se verifica si todo sumo cero para hacer las inserciones en la base de datos, si no es asi cancela todas la inserciones
    $verificarinsert==0?$this->conexion->commit():$this->conexion->rollback();
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
  echo $verificarinsert;


    
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
    $insertar="INSERT INTO USUARIOS(id_usuario,Nombre,Apellidos,Correo,Password,Activo,Creado,TipoUsuario) VALUES ('".$id."','".$nombre."','".$apellidos."','".$correo."','".$password."',".$activo.",".$creado.",'".$tipousuario."')";
  
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
   public function generaid()
  {
    //se declara la variable como 0
    $id=0;
    
     $sql="SELECT MAX(id_usuario)AS id_usuario FROM USUARIOS";
     //la consulta arrojara el numero mayor de la tabla y se sumara 1
     //ejemplo consulta=17 , 17+1=18, 18 es el nuevo id que se agregara(**())
              $this->resultados=$this->conexion->query($sql);
              $row=$this->resultados->fetch_array();
              $id_usuario=$row["id_usuario"];
              $id=$id_usuario+1;
              //$usuario->setId_Usuario($id_usuario);
          return $id;
  }
  
}

