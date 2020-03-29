<?php
class ModeloPublicidad extends ConexionBD
{
	public function __contruct()
	{
		parent::__construct();
	}
public function mostrar($iniciosesion=null,$periodo=null,$nivel=null,$taller=null)
{
    $inscripcion="";
    $condicion2="";
    $condicion3="";
    $espacios="";

    if($taller!=null)
    {

      $condicion2=" AND id_taller=$taller";
      
    }
    if($nivel!=null)
    {
      $condicion3="AND Carrera='$nivel'";
    }



   $sql="SELECT *FROM TALLERES,ESPACIOS WHERE Convocatoria=$periodo $condicion2 $condicion3 AND ESPACIOS.ClaveConvocatoria=TALLERES.Convocatoria AND ESPACIOS.ClaveNivel=TALLERES.Carrera;
   ";

   $salida="";
    if($this->conexion->query($sql)!=null)
   {
    
        $consulta=$this->conexion->query($sql);
        while ($row=$consulta->fetch_array())
        {

          $id=$row['id_taller'];
          $nombre=$row["Nombre"];
          $espacio=$row['Espacio'];
          $min=$row['Min'];
          $nivel=$row['Carrera'];

          $completo=$taller!=null?"Inscrito":"Taller Completo";
          if($iniciosesion)
              {
                    $inscripcion=$taller!=null?"<p class='box-modern-title'>Inscrito</p>":
                    "
               <button type='button' class='button button-primary sm inscripcion' data-toggle='modal' data-target='#exampleModal' data-nombre='$nombre' data-id='$id' onclick='inscripcion(this);'>
                  Incribirse
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
                  <p class='box-modern-title'>$nombre</p>
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
                        <div class='box-modern-text'>
                            
                          
                        </div>
                      </article>
                    </div>";  
              }
        
        
        }


    }
      
      
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
      $consulta="SELECT * FROM INSTALLERS WHERE INSCRIPCION_Matricula='$matricula'";
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

}
?>


