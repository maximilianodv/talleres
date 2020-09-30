<?php
class ModeloPublicidad extends ConexionBD
{
	public function __contruct()
	{
		parent::__construct();

		/*date_default_timezone_set('America/Argentina/San_Luis');
		$hoy = getdate();
		print_r($hoy);*/
		//
		//date_default_timezone_set('Europe/Dublin');
		//date_default_timezone_set('America/Mexico_City');
	}
  public function escdisp($taller,$convocatoria,$nivel){
      $consulta="SELECT (ESPACIOS.Max-BUSCTOTS.Total)AS Disponible,BUSCTOTS.Total AS Totales FROM ESPACIOS,(SELECT COUNT(*)AS Total FROM INSTALLERS WHERE INSTALLERS.TALLERES_id_taller=$taller) AS BUSCTOTS WHERE ESPACIOS.ClaveConvocatoria=$convocatoria AND ESPACIOS.ClaveNivel='$nivel' ";

        $this->resultados=$this->conexion->query($consulta);
        $row=$this->resultados->fetch_array();
        $dis=$row["Disponible"];
        return $dis;

  }
public function mostrar($iniciosesion=null,$periodo=null,$nivel=null,$taller=null,$fechasconvarg=null,$fechacierre=null,$prorogainicio=null,$prorogafion=null){
    $inscripcion="";
    $condicion2="";
    $condicion3="";
    $espacios="";
		$sql="";
		/*print_r($hoy[mon]);
		print_r($hoy[wday]);*/
		//print_r(date());
	//	echo $fechasconv["inicio"];
		//echo $fechasconv["fin"];
		$oDate1 = new DateTime($fechasconvarg["inicio"]);
		$fechasconv = $oDate1->format("d-m-Y");


		$oDate2 = new DateTime($fechasconvarg["fin"]);
		$fechafin = $oDate2->format("d-m-Y");

		$oDate3 = new DateTime($fechasconvarg["PrInicio"]);
		$fechaproroga = $oDate3->format("d-m-Y");

		$oDate4 = new DateTime($fechasconvarg["PrFin"]);
		$finproroga= $oDate4->format("d-m-Y");
		$oDate5 = new DateTime("14-01-2021 10:00:00");
		$hoy= $oDate5->format("d-m-Y");
		$rellenobotoninsc=true;
		//echo date(Y).'-'.date(m).'-'.date(d)."  ".date(H).":".date(i);

		//echo date("Y-m-d H:i:s");
    if($taller!=null){
			$condicion2=" AND id_taller=$taller";
		}
    if($nivel!=null){
      $condicion3="AND Carrera='$nivel'";
    }
		$sql="SELECT * FROM TALLERES,ESPACIOS WHERE Convocatoria=$periodo $condicion2 $condicion3 AND ESPACIOS.ClaveConvocatoria=TALLERES.Convocatoria AND ESPACIOS.ClaveNivel=TALLERES.Carrera;";
		if($fechasconv<=$hoy && $hoy<=$fechafin){
							$rellenobotoninsc=true;
				}

	else if($fechaproroga<=$hoy && $hoy<$finproroga){
 						$sql="";
						$rellenobotoninsc=true;
 							//sql de proroga
 			}
/*
		else*/
/*		else if($finproroga<$hoy){
				echo "queodna";
				$sql="";
		}*/

		$salida="";
    if($this->conexion->query($sql)!=null||$sql!=""){
			$consulta=$this->conexion->query($sql);
        while ($row=$consulta->fetch_array()){
					$id=$row['id_taller'];
          $nombre=$row["Nombre"];
				//	$fechasconv="2020-02-02";
					$min=$row['Min'];
          $nivel=$row['Carrera'];
          $espacio=$this->escdisp($id,$periodo,$nivel);
					$completo=$taller!=null?"Inscrito":"Taller Completo";
          if($iniciosesion && $rellenobotoninsc){
            $inscripcion=$taller!=null?"<p class='box-modern-title'>Inscrito</p>":
                    "
               <button type='button' class='button button-primary sm inscripcion' data-toggle='modal' data-target='#exampleModal' data-nombre='$nombre' data-id='$id' onclick='inscripcion(this);'>
                  Incribirse $periodo
                </button>";
              }
          if($espacio==0)
              {
                  $salida.=" <div class='col-sm-6 col-lg-4'>
                <!-- Box Modern-->
                <article class='box-modern wow fadeIn' data-anime='circles-2'>
                  <div class='box-modern-media'>
                    <div class='box-modern-icon mdi mdi-television-guide'></div>
                    <div class='box-modern-circle box-modern-circle-1'></div>
                  </div>
                  <p class='box-modern-title'>$nombre </p>
                  <p class='box-modern-title'>$nivel</p>
                  <div class='box-modern-text' id='{$id}div'>
                    <p>Espacio:$espacio</p>
                    <p class='box-modern-title'>$completo</p>
                  </div>
                  <div class='box-modern-text'>


                    </div>
                  </article>
                </div>";

              }
              else
              {
                $salida.=" <div class='col-sm-6 col-lg-4'>
                      <!-- Box Modern-->
                      <article class='box-modern wow fadeIn' data-anime='circles-2'>
                        <div class='box-modern-media'>
                          <div class='box-modern-icon mdi mdi-television-guide'></div>
                          <div class='box-modern-circle box-modern-circle-1'></div>
                        </div>
                        <p class='box-modern-title'>$nombre</p>
                        <p class='box-modern-title'>$nivel</p>
                        <div class='box-modern-text' id='{$id}div'>
                          <p >Espacio:$espacio</p>
                          <p >Minimo:$min</p>
                             $inscripcion
												</div>
                        <div class='box-modern-text'></div>
                      </article>
                    </div>";
              }


        }


    }

		if($salida==null||$salida==""){
			$salida="<h3 class='wow fadeIn' style='visibility: visible; animation-name: fadeIn;'>Finalizado</h3>";
		}
		/*$fechaactual="2020-09-13";
		$salida=$fechaactual=="2020-09-13"?"<h1>Perido terminado</h1>":"";*/
    return $salida;
}
public function categoria($categoria)
{
  $consulta="SELECT * FROM CATEGORIAS WHERE Idcategoria=$categoria";
  $this->resultados=$this->conexion->query($consulta);
  $row=$this->resultados->fetch_array();
  $categoria=$row["Nombrevista"];
  return $categoria;
}


  public function __destruct()
  {
  	$this->conexion->close();
  }


   public function espacios($id)
  {
        $consulta="SELECT * FROM TALLERES WHERE id_taller=$id";
        $this->resultados=$this->conexion->query($consulta);
        $row=$this->resultados->fetch_array();
        $conteo=$row["Espacio"];
        return $conteo;
  }

   public function inscrito($id,$espacio=null,$matricula=null)
  {

      $nuevoespacio=$espacio-1;
      if ($nuevoespacio==-1)
      {
        return false;
      }
      else
      {
          $nuevinscrito=$this->alumnoinscrito($matricula,$id);
          $act=$this->actualizacion($id);



          if($act and $nuevinscrito)
          {
            $this->conexion->commit();
            return true;
          }
          else
          {
            $this->conexion->rollback();
            return false;
          }



      }



  }


   public function mostrarespacio($id)
  {
      $salida="";
      $consulta=$this->conexion->query("SELECT *FROM TALLERES WHERE id_taller='$id'");
      while ($row=$consulta->fetch_array())
        {
                $espacio=$row["Espacio"];
                if($espacio==0)
                {
                 $salida="<p>Espacio:$espacio</p>
                <p class='box-modern-title'>Taller Completo</p>";

                }
                else
                {
                    $salida="<p>Espacio:$espacio</p>
                <button class='button button-primary sm inscripcion'  data-id='{$id}'>Incribirse</button>";
                }

        }


      return $salida;
  }
  public function alumnoinscrito($matricula,$taller)
  {

    try {
           $this->conexion->autocommit(FALSE);
          $insert="INSERT INTO INSCRIPCION (Matricula, Nombre, Carrera, Taller, Instructor, Grado, Grupo, Idconstancia, Usuario) VALUES ($matricula, 'nose', 1, $taller, 46, 1, 1, 1, 1)";

          if ($this->conexion->query($insert))
          {

            return true;
          }

      }
      catch (Exception $e)
      {
          echo $e->getMessage();

      }
      catch (InvalidArgumentException $e)
      {
          echo $e->getMessage();
      }
      catch (mysqli_sql_exception $e)
      {
        echo $e->getMessage();
      }
      return false;
  }
  public function actualizacion($id,$matricula=null)
  {
    try {
          $this->conexion->autocommit(FALSE);

          $actualizar="UPDATE TALLERES SET Espacio=Espacio-1 WHERE id_taller='$id'";

            if ($this->conexion->query($actualizar))
          {


            $this->conexion->commit();
              return true;
          }
      }
      catch (Exception $e)
      {
          echo $e->getMessage();

      }
      catch (InvalidArgumentException $e)
      {
          echo $e->getMessage();
      }
      catch (mysqli_sql_exception $e)
      {
        echo $e->getMessage();
      }
      return false;
  }
  public function comboniveles()
  {
    $salida="";
      $consulta=$this->conexion->query("SELECT * FROM NIVELES");
      while ($row=$consulta->fetch_array())
        {

          $clave=$row["ClaveNivel"];
          $nombre=$row["Nombre"];
          $salida.="<option value='$clave'>$nombre</option>";

        }


      return $salida;
  }
  public function combogrados($periodo)
  {
    $salida="";
      $consulta=$this->conexion->query("SELECT * FROM GRADO WHERE ClaveConvocatoria='$periodo'");
      while ($row=$consulta->fetch_array())
        {

          $clave=$row["Id_Cuatrimestre"];
          $nombre=$row["Cuatrimestre"];
          $salida.="<option value='$clave'>$nombre</option>";

        }


      return $salida;
  }
  public function verificarins($matricula,$periodo)
  {
      //$consulta="SELECT * FROM INSCRIPCION WHERE Matricula='$matricula' AND Taller=(SELECT id_taller from talleres WHERE Convocatoria=$periodo)";
      $consulta="SELECT * FROM INSTALLERS WHERE INSCRIPCION_Matricula='$matricula' AND INSCRIPCION_ClaveConvocatoria=$periodo";
        $this->resultados=$this->conexion->query($consulta);
        $row=$this->resultados->fetch_array();
        $taller=$row["TALLERES_id_taller"];
        return $taller;
  }
  public function nivel($matricula)
  {
    $consulta="SELECT ClaveNivel FROM REGISTRO WHERE Matricula=$matricula";
      $this->resultados=$this->conexion->query($consulta);
      $row=$this->resultados->fetch_array();

      $nivel=$row["ClaveNivel"];
    return $nivel;

    //return "2";
  }
  public function carreras($nivel)
  {
     $salida="";
      $consulta=$this->conexion->query("SELECT * FROM CARRERAS WHERE NIVELES_ClaveNivel='$nivel'");
      while ($row=$consulta->fetch_array())
        {

          $clave=$row["ClaveCarrera"];
          $nombre=$row["Nombre"];
          $salida.="<option value='$clave'>$nombre</option>";

        }


      return $salida;
  }
	public function iffininscripcion($convocaria){
		$fecha="2019-09-30";
		$salida="";
		$consulta=$this->conexion->query("SELECT *FROM CONVOCATORIAS WHERE ClaveConvocatoria='$convocaria' AND CierreConvocatoria<=$fecha");
		while ($row=$consulta->fetch_array()){
				$salida.=$row["CierreConvocatoria"];
			}
			return $salida;

	}


}
?>
