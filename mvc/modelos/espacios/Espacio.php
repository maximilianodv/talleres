<?php
class Espacio
{
  private $claveconvocatoria;
  private $clavenivel;
  private $max;
  private $min;
  
  
  public function __construct($claveconvocatoria=null, $clavenivel=null, $max=null, $min=null)
  {
    $this->claveconvocatoria = $claveconvocatoria;
    $this->clavenivel = $clavenivel;
    $this->max = $max;
    $this->min = $min;
    
  }

function getClaveConvocatoria()
{
  return $this->claveconvocatoria;
}
function getClaveNivel()
{
  return $this->clavenivel;
}
function getMax()
{
  return $this->max;
}
function getMin()
{
  return $this->min;
}


function setClaveConvocatoria($claveconvocatoria)
{
  $this->claveconvocatoria = $claveconvocatoria;
}
function setClaveNivel($clavenivel)
{
  $this->clavenivel=$clavenivel;
}
function setMax($max)
{
  $this->max=$max;
}
function setMin($min)
{
  $this->min=$min;
}



}
