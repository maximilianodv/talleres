<?php
class Convocatoria
{
  private $claveconvocatoria;
  private $periodo;
  private $anio;
  private $alumnosmin;
  private $alumnosmax;
  private $convocatoriafecha;
  private $activo;
  private $finconvocatoria;
  private $prginicio;
  private $prgfin;
  public function __construct($claveconvocatoria=null, $periodo=null, $anio=null, $alumnosmin=null,$alumnosmax=null,$convocatoriafecha=null,$finconvocatoria=null,$activo=null,$prginicio=null,$prgfin=null)
  {
    $this->claveconvocatoria = $claveconvocatoria;
    $this->periodo = $periodo;
    $this->anio = $anio;
    $this->alumnosmin = $alumnosmin;
    $this->alumnosmax= $alumnosmax;
    $this->convocatoriafecha= $convocatoriafecha;
    $this->activo= $activo;
    $this->finconvocatoria=$finconvocatoria;
    $this->prginicio=$prginicio;
    $this->prgfin=$prgfin;
    
  }

function getClaveConvocatoria()
{
  return $this->claveconvocatoria;
}
function getPeriodo()
{
  return $this->periodo;
}
function getAnio()
{
  return $this->anio;
}
function getAlumnosMin()
{
  return $this->alumnosmin;
}
function getAlumnosMax()
{
  return $this->alumnosmax;
}
function getConvocatoriaFecha()
{
  return $this->convocatoriafecha;
}
function getActivo()
{
  return $this->activo;
}
function getFinConvocatoria()
{
  return $this->finconvocatoria;
}
function getPrgInicio()
{
  return $this->prginicio;
}
function getPrgFin()
{
  return $this->prgfin;
}

function setClaveConvocatoria($claveconvocatoria)
{
  $this->claveconvocatoria = $claveconvocatoria;
}
function setPeriodo($periodo)
{
  $this->periodo=$periodo;
}
function setAnio($anio)
{
  $this->alumnosmin=$anio;
}
function setAlumnosMin($alumnosmin)
{
  $this->alumnosmin=$alumnosmin;
}
function setAlumnosMax($alumnosmax)
{
  $this->alumnosmax= $alumnosmax;
}
function setConvocatoriaFecha($convocatoriafecha)
{
  $this->convocatoriafecha=$convocatoriafecha;
}
function setActivo($activo)
{
  $this->activo=$activo;
}
function setFinConvocatoria($finconvocatoria)
{
  $this->finconvocatoria=$finconvocatoria;
}
function setPrgInicio($prginicio=null)
{
  $this->prginicio=$prginicio;
}
function setPrgFin($prgfin=null)
{
  $this->prgfin=$prgfin;
}
}
