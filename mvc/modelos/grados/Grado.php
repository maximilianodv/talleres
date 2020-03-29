<?php
class Grado
{
  private $id_cuatrimestre;
  private $periodo;
  private $anio;
  private $cuatrimestre;
  private $claveperiodo;
  
  public function __construct($id_cuatrimestre=null, $periodo=null, $anio=null,$cuatrimestre=null,$claveperiodo=null)
  {
    $this->id_cuatrimestre = $id_cuatrimestre;
    $this->periodo = $periodo;
    $this->anio = $anio;
    $this->cuatrimestre=$cuatrimestre;
    $this->claveperiodo=$claveperiodo;
    
  }

function getId_Cuatrimestre()
{
  return $this->id_cuatrimestre;
}
function getPeriodo()
{
  return $this->periodo;
}
function getAnio()
{
  return $this->anio;
}
function getCuatrimestre()
{
  return $this->cuatrimestre;
}
function getClavePeriodo()
{
  return $this->claveperiodo;
}
function setId_Cuatrimestre($id_cuatrimestre)
{
      $this->id_cuatrimestre = $id_cuatrimestre;

}
function setPeriodo($periodo)
{
  $this->periodo=$periodo;
}
function setAnio($anio)
{
  $this->anio=$anio;
}
function setCuatrimestre($cuatrimestre)
{
  $this->cuatrimestre=$cuatrimestre;
}
function setClavePeriodo($claveperiodo)
{
  $this->claveperiodo=$claveperiodo;
}



}
