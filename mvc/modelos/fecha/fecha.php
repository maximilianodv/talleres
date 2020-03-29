<?php
class Fecha
{
  private $anio;
  private $mes;
  private $dia;
  
  
  public function __construct()
  {
     $hoy = getdate();
    $this->anio=$hoy['year'];
    $this->mes=$hoy['mon'];
    $this->dia=$hoy['mday'];

  }

function getAnio()
{
  return $this->anio;
}
function getMes()
{
  return $this->mes;
}
function getDia()
{
  return $this->dia;
}



function setAnio($anio)
{
  $this->anio = $anio;
}
function setMes($mes)
{
  $this->mes=$mes;
}
function setDia($dia)
{
  $this->dia=$dia;
}
public function hoy()
{
  
  if($this->getMes()<10)
  {
    $this->mes='0'.$this->getMes();
  }
  if($this->getDia()<10)
  {
      $this->dia='0'.$this->getDia();
  }
  $d=$this->getDia();
  $m=$this->getMes();
  $y=$this->getAnio();

  $fecha="$y-$m-$d";

  return $fecha;
  
}
public function sumadias()
{
    $fecha = date('Y-m-j');
    $nuevafecha = strtotime ( '+2 day' , strtotime ( $fecha ) ) ;
    $nuevafecha = date ( 'Y-m-j' , $nuevafecha );
    echo $nuevafecha;
}

}
