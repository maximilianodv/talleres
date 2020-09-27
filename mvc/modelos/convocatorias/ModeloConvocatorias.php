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
    date_default_timezone_set('America/Mexico_City');
  }


  public function insertar($convocatoria,$grado,$cuatrimestre=null,$modeloesp=null,$max=null,$min=null)
  {

    $this->modeloespacio=$modeloesp;
    $clavecuatri="";
    $verificarinsert=0;
    $niveles[0] ="TSU";
    $niveles[1] ="ING";
    $this->conexion->autocommit(FALSE);

      $verificarinsert=$verificarinsert+$this->insertarconvocatoria($convocatoria);
      $tamaño=count($cuatrimestre);
      for ($i=0; $i <$tamaño; $i++)
      {
          $newcuatri=$cuatrimestre[$i];
          $clavecuatri=$newcuatri.$convocatoria->getClaveConvocatoria();
          $grado->setId_Cuatrimestre($clavecuatri);
          $grado->setCuatrimestre($newcuatri);
          $verificarinsert=$verificarinsert+$this->insertgrados($grado);

      }

     for ($j=0; $j <count($niveles); $j++)
      {
        $espac=new Espacio($convocatoria->getClaveConvocatoria(),$niveles[$j],$max[$j],$min[$j]);
        $verificarinsert=$verificarinsert+$this->insertarespacio($espac);
      }

    $verificarinsert=$verificarinsert+$this->updateactivos($convocatoria->getClaveConvocatoria());
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
  public function updateespacios($convocatoria,$nivel,$min,$max)
  {

      $buscarespacios="SELECT * FROM ESPACIOS WHERE ClaveConvocatoria='{$convocatoria}' AND ClaveNivel='{$nivel}'";
      $this->resultados2=$this->conexion->query($buscarespacios);
      $row2=$this->resultados2->fetch_array();
      $minodl=$row2["Min"];
      $maxold=$row2["Max"];
      $updatetsu="UPDATE ESPACIOS SET Min=$min,Max=$max WHERE ClaveConvocatoria='{$convocatoria}' AND ClaveNivel='{$nivel}'";
      $this->conexion->query($updatetsu);
      $talleres=$this->idstallconvo($convocatoria);
      if($max<$maxold)
      {
        $seldel=$maxold-$max;
          foreach ($talleres as $id)
          {
                $this->del1insc($id,$seldel);
          }
      }

  }
  public function idstallconvo($convocaria){
    $resultSet=$this->conexion->query("SELECT TALLERES.id_taller FROM TALLERES WHERE Convocatoria=$convocaria");
    $talleres=array();
    while($row = $resultSet->fetch_array()){

        array_push($talleres,$row["id_taller"]);
      }

    return $talleres;
  }

  public function del1insc($idtaller,$eliminados){

         $deletealumntall="DELETE FROM INSTALLERS WHERE TALLERES_id_taller=$idtaller ORDER BY INSTALLERS.Fecha DESC LIMIT $eliminados";

          $this->conexion->query($deletealumntall);
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
          <th>Finalizado</th>
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
        $iffinalizado=$row["Finalizado"]=="1"?"checked":"";
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
            <div class='custom-control custom-switch'>
              <input type='checkbox' class='custom-control-input clsfinz' id='{$clave}' $iffinalizado>

            </div>
           </td>

           <td>

              <button type='button' id='$clave' data-clave='$clave' class='btnEditar  btn btn-primary btn-sm' data-target='#editconvocatoria' data-toggle='modal' >
                <i class='fa fa-edit  fa-lg text-white'  data-toggle='modal' data-target='#newarticulo' ></i>
              </button>
              <button type='button' data-clave='$clave' class='btnEliminar btn btn-danger btn-sm'>
                <i class='fa fa-trash  fa-lg text-white'  data-toggle='modal' data-target='#modalconfirmar'></i>
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

     $sql="SELECT ClaveConvocatoria FROM CONVOCATORIAS WHERE Activo=1 AND Finalizado=0";
     //la consulta arrojara el numero mayor de la tabla y se sumara 1
     //ejemplo consulta=17 , 17+1=18, 18 es el nuevo id que se agregara(**())
        $this->resultados=$this->conexion->query($sql);
        $row=$this->resultados->fetch_array();
        $convocatoria=$row["ClaveConvocatoria"];
        //$usuario->setId_Usuario($id_usuario);
        return $convocatoria;
  }
  public function fechasperiodoactual(){
   $sql="SELECT ConvocatoriaFecha AS inicio,CierreConvocatoria AS fin,ProrrogaInicio AS PrInicio,ProrrogaFin AS PrFin FROM CONVOCATORIAS WHERE Activo=1 AND Finalizado=0";
   //la consulta arrojara el numero mayor de la tabla y se sumara 1
   //ejemplo consulta=17 , 17+1=18, 18 es el nuevo id que se agregara(**())
      $this->resultados=$this->conexion->query($sql);
      $row=$this->resultados->fetch_array();
      //$convocatoria=$row["ClaveConvocatoria"];
      //$usuario->setId_Usuario($id_usuario);
      return $row;
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
  public function updateconvocatoria($convocatoria,$idold){
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

    $update="UPDATE CONVOCATORIAS
              SET ClaveConvocatoria='{$clave}',
              Periodo='{$periodo}',
              Año='{$anio}',
              AlumnosMin='{$min}',
              AlumnosMax='{$max}',
              ConvocatoriaFecha='{$fecha}',
              CierreConvocatoria='{$finconvocatoria}',
              ProrrogaInicio='{$prginicio}',
              ProrrogaFin='{$prgfin}'
              WHERE ClaveConvocatoria='{$idold}'";


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
  public function historialalumno($matricula){
    $hoyanio = date('Y');
    $buscar="SELECT (REGISTRO.GradoInicial+CONTEO.Inicial)AS Cuatri FROM TALLERES.REGISTRO,(SELECT COUNT(*)AS Inicial FROM TALLERES.INSCRIPCION WHERE Matricula='{$matricula}')AS CONTEO WHERE Matricula='{$matricula}'";
    $this->resultados=$this->conexion->query($buscar);
    $row=$this->resultados->fetch_array();
    //$convocatoria=$row["ClaveConvocatoria"];

    $respuesta["cuatrimestre"]=$row["Cuatri"];
    $respuesta["anio"]=$hoyanio;
    return $respuesta;
  }
  public function interruptor($id,$newvalor){
    //UPDATE `TALLERES`.`CONVOCATORIAS` SET `Finalizado` = '0' WHERE (`ClaveConvocatoria` = '2020912');
    $updateintr="UPDATE CONVOCATORIAS SET Finalizado=$newvalor WHERE ClaveConvocatoria=$id";

    //echo $update;
    $this->conexion->query($updateintr);

  }
  public function consulta($clave,$tipo=null)
  {
    $buscar="SELECT * FROM CONVOCATORIAS  WHERE ClaveConvocatoria='{$clave}'";
    $valor=$this->resultados=$this->conexion->query($buscar);
    $row=$this->resultados->fetch_array();

        $convocatoria=$row["ClaveConvocatoria"];
        $periodo=$row['Periodo'];
        $anio=$row['Año'];
        $fecha=$row["ConvocatoriaFecha"];
        $cierre=$row["CierreConvocatoria"];
        $prginicio=$row["ProrrogaInicio"];
        $prgfin=$row["ProrrogaFin"];
        $respuesta["encontrado"]="false";
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

        if($tipo!=null&&$convocatoria!=null){
            $respuesta["encontrado"]="true";
        }
        elseif ($convocatoria==null) {
          $respuesta["encontrado"]="false";
        }

       $respuesta['convocatoria']=$convocatoria;
       $respuesta['periodo']=$periodo;
       $respuesta['anio']=$anio;
       $respuesta['fecha']=$fecha;
       $respuesta['cierre']=$cierre;
       $respuesta['prginicio']=$prginicio;
       $respuesta['prgfin']=$prgfin;
       $respuesta['esptsumin']=$esptsumin;
       $respuesta['esptsumax']=$esptsumax;
       $respuesta['espingmin']=$espingmin;
       $respuesta['espingmax']=$espingmax;
       return $respuesta;
  }




}
