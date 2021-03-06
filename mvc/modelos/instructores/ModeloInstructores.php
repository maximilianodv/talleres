<?php
class ModeloInstructores extends ConexionBD
{
  private $usuario;
  private $instructor;
  private $taller;
  public function __construct()
  {
    parent::__construct();
    require_once 'mvc/modelos/instructores/Instructor.php';
    require_once 'mvc/modelos/instructores/Taller.php';
    require_once 'mvc/modelos/usuarios/Usuario.php';
  }
  public function datosEditar($idIstructor){
    $query="SELECT * FROM INSTRUCTORES  inner join USUARIOS on INSTRUCTORES.id_usuario=USUARIOS.id_usuario WHERE id_instructor='$idIstructor'";

    $resultSet=$this->conexion->query($query);


    $instructor2 = array();
    $nombre = array();
    $apellidop = array();
    $apellidop = array();
    $correo = array();
    $telefono = array();
    $id_usuario = array();
    $objeto =new Instructor();

    $row = $resultSet->fetch_array();
        $instructor2 = $row["id_instructor"];
        $nombre= $row["Nombre"];
        $apellidop= $row["ApellidoP"];
        $apellidom= $row["ApellidoM"];
        $correo= $row["Correo"];
        $telefono= $row["Telefono"];
        $id_usuario= $row["id_usuario"];
      //  $instructor2=hash('sha512',$instructor2);

        $datos= array( "id_instructor" =>$instructor2,
                              "Nombre" =>   $nombre,
                             "ApellidoP" => $apellidop,
                             "ApellidoM" => $apellidom,
                             "Correo" => $correo,
                             "Telefono" => $telefono,
                             "Nombreusuario" => $row["NombreUsuario"],
                             "Password" =>$row["Password"]);


    return json_encode($datos);

    //$resultSet->fetch_array();

  }
   public function mostrar()
  {
    $resultSet=$this->conexion->query("SELECT * FROM INSTRUCTORES WHERE status=1");
    $salida = "
  <table id='tablaInstructores' class='table table-bordered table-hover'>
<thead>
      <tr>
        <th>Nombre</th>
        <th>Correo</th>
        <th>Telefono</th>
        <th>opciones</th>
      </tr>
    <thead>
    <tbody>";
    while($row = $resultSet->fetch_array())
      {
        $id=$row[0];
        $nombre=$row[1];
        $paterno=$row[2];
        $materno=$row[3];
        $nombrecompleto=$nombre." ".$paterno." ".$materno;
        $correo=$row[4];
        $telefono=$row[5];

        $salida .= "
        <tr id=$id >
          <td>$nombrecompleto</td>
          <td>$correo</td>
          <td>$telefono</td>
          <td>
            <button type='button' data-id='$id' data-clave='$clave' class='btnEditarU  btn btn-primary btn-sm btnmdl'  data-toggle=modal
            data-target='#nuevoinstructor' data-tpbt='btnEditar' onclick='modal(this)' data-name='Editar' data-toggle='modal' data-target='#editinstr'>
              <i class='fa fa-edit  fa-lg text-white'   ></i>
            </button>
            <button type='button' data-id='$id' class='btnEliminar btn btn-danger btn-sm' onclick='enviarideliminar($id)' data-toggle='modal' data-target='#modalconfirmar'>
              <i class='fa fa-trash  fa-lg text-white'></i>
            </button>

          </td>
        </tr>";
      }
    $salida .= "</tbody></table>";

    return $salida;
  }
  public function ejemplo()
  {
    return "mostrar ejemplo";
  }
  public function insertar($usuario,$instructor)
  {
    $salida="";
    //se declaran lavariables
    $this->usuario=$usuario;
    $this->instructor=$instructor;


      //verificar insert verifica que proceso salio mal, si todos los procesos salieron arrojara un 0 al sumar lo que retorna cada funcion, si alguna falla no se hace el registro en ninguna tabla
    $verificarinsert=0;
    //generarid es una funcion para buscar el id maximo que tiene la tabla y sumarle 1 para crear un autoincrement pero sabiendo el id que se agregara
    $this->usuario->setId_Usuario($this->generaid());

    $verificarinsert=$verificarinsert+$this->insertarUsuario($this->usuario);
    $this->instructor->setId_Usuario($this->usuario->getId_Usuario());
    $verificarinsert=$verificarinsert+$this->insertarInstructor($this->instructor);
    //$this->taller->setId_Usuario($this->usuario->getId_Usuario());
    //$verificarinsert=$verificarinsert+$this->insertarTaller($this->taller);
      //se verifica si todo sumo cero para hacer las inserciones en la base de datos, si no es asi cancela todas la inserciones
    $verificarinsert==0?$this->conexion->commit():$this->conexion->rollback();
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
    $nombreusuario=$usuario->getUsuario();
    //hacela insersion
     if($correo==""||$correo=='')
    {
      $correo=NULL;
    }

    $insertar="INSERT INTO USUARIOS VALUES ('".$id."','".$nombre."','".$apellidos."','".$correo."','".$password."',".$activo.",".$creado.",'".$tipousuario."','".$nombreusuario."')";

    echo $insertar;
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
  public function insertarInstructor($instructor)
  {

    $this->conexion->autocommit(FALSE);
    $campos="";
    $id=$instructor->getIdInstructor();
    $nombre=$instructor->getNombre();
    $apellidop=$instructor->getApellidoP();
    $apellidom=$instructor->getApellidoM();
    $correo=$instructor->getCorreo();
    $telefono=$instructor->getTelefono();

    $usuarioinstructor=$instructor->getId_Usuario();

    if($correo==""||$correo=='')
    {
      $correo="NULL";
    }
    else
    {
      $correo="'".$correo."'";
    }
    if($telefono==""||$telefono==null)
    {
      $campos="(id_instructor, Nombre, ApellidoP, ApellidoM, Correo,id_usuario)";
      //Nombre,ApellidoP, ApellidoM,Correo,Telefono,id_usuario
    }
    else
    {
      $telefono=",".$telefono;
    }
    $campos="(Nombre,ApellidoP, ApellidoM,Correo,Telefono,id_usuario)";
    /*$salida.="instructor <br>$id<br>$nombre<br>$apellidop<br>$apellidom<br>$correo<br>$telefono<br>$usuario<br><br>";*/

    $insertar="INSERT INTO INSTRUCTORES $campos VALUES ('".$nombre."','".$apellidop."','".$apellidom."',".$correo."".$telefono.",'".$usuarioinstructor."')";
    echo $insertar;

     try{

        if( !$this->conexion->query($insertar))
          {
        throw new Exception('error!');
          }
          else
          {
            return 0;
          }

      }
        catch( Exception $e )
        {
          //$this->conexion->rollback();
          return 1;
        }
      //$this->conexion->commit();


  }
  public function insertarTaller($taller)
  {
    $salida="";
    $this->conexion->autocommit(FALSE);
    $id=$taller->getId_Taller();
    $nombretaller=$taller->getNombre();
    $horas=$taller->getNo_Horas();
    $convocatoria=$taller->getConvocatoriaRuta();
    $activo=$taller->getActivo();
    $creado=$taller->getCreado();
    $usuariotaller=$taller->getId_Usuario();
    $descripciontaller=$taller->getDescTaller();
    /*$salida.="instructor <br>$id<br>$nombre<br>$horas<br>$convocatoria<br>$activo<br>$creado<br>$usuario<br>";*/

    $insertar="INSERT INTO TALLERES VALUES ('','".$nombretaller."',".$horas.",'".$convocatoria."',".$activo.",'".$creado."','".$usuariotaller."')";
    echo $insertar;

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
  public function getUsuarioInstru(){

  }
  public function eliminar($id){
    
    $sql="UPDATE INSTRUCTORES SET status=0 WHERE id_instructor='$id'";
  
    //la consulta arrojara el numero mayor de la tabla y se sumara 1
    //ejemplo consulta=17 , 17+1=18, 18 es el nuevo id que se agregara(**())
      if($this->conexion->query($sql)){
        return 1;
      }
      else{
        return 0;
      }
  }
  public function modificar($instructor){

    
    //$this->conexion->autocommit(FALSE);
    $campos="";
    $id=$instructor->getIdInstructor();
    $nombre=$instructor->getNombre();
    $apellidop=$instructor->getApellidoP();
    $apellidom=$instructor->getApellidoM();
    $correo=$instructor->getCorreo();
    $telefono=$instructor->getTelefono();

    $usuarioinstructor=$instructor->getId_Usuario();

    if($correo==""||$correo=='')
    {
      $correo="NULL";
    }
    else
    {
      $correo="'".$correo."'";
    }
    
    /*$salida.="instructor <br>$id<br>$nombre<br>$apellidop<br>$apellidom<br>$correo<br>$telefono<br>$usuario<br><br>";*/

    $updainstr="UPDATE INSTRUCTORES set Nombre='$nombre',Apellidop='$apellidop',Apellidom='$apellidom',Correo=$correo,Telefono='$telefono' WHERE id_instructor=$id";
    
    //$this->conexion->query($updainstr);
    
     try{

        if( !$this->conexion->query($updainstr))
          {
          throw new Exception('error!');
          }
          else
          {
            return 0;
          }

      }
        catch( Exception $e )
        {
          $this->conexion->rollback();
          return 1;
        }
      $this->conexion->commit();

  }
}
